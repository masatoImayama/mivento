<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;

use App\ApplicationService\Commands\StatusChangeCommand;
use App\ApplicationService\BoardApplicationService;
use App\ApplicationService\EventApplicationService;
use App\ApplicationService\Commands\EventRegistCommand;
use App\ApplicationService\Commands\EventDeleteCommand;

class EventController extends Controller
{

	public function index($hash_key)
	{
		$board = BoardApplicationService::findBoard($hash_key);

		return view('event.events')->with([
			'board' => $board
		]);
	}

	public function eventForm($board_hash_key, $event_hash_key = null) {
		if ($event_hash_key === null) {
			// 新規追加
			$event = array();
		} else {
			// 編集
			$event = EventApplicationService::findEvent($event_hash_key);
		}

		return view('event.event_form')->with([
			'event' => $event,
			'board_hash_key' => $board_hash_key
		]);
	}

	public function eventConfirm(Request $request) {
		// チェック処理
		$validatedData = $request->validate([
			'event_name' => 'required|string|max:256',
			'description' => 'nullable|string|max:1500',
			'event_start_datetime' => 'required|date_format:Y-m-d H:i',
			'event_end_datetime' => 'required|date_format:Y-m-d H:i|after_or_equal:event_start_datetime',
		]);

		return view('event.event_confirm')->with($request->all());
	}

	public function eventRegist(Request $request) {
		try {
			$board_hash_key = $request->input("board_hash_key");
			if ($request->has('back')) {
				return redirect()->route('event_form', ['board_hash_key' => $board_hash_key])->withInput();
			}

			$command = new EventRegistCommand(
				$board_hash_key,
				$request->input("event_name"), 
				$request->input("description"),
				$request->input("event_start_datetime"),
				$request->input("event_end_datetime")
			);
			if (!empty($request->input("event_hash_key"))) {
				// 更新処理
				EventApplicationService::updateEvent($request->input("event_hash_key"), $command);
			} else {
				// 登録処理
				EventApplicationService::addEvent($command);
			}

			// TODO:完了通知表示用の処理追加？
			return redirect()->route('events', ['hash_key' => $command->getBoardHashCode()]);
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function statusChange(Request $request) {
		// パラメータチェック
		$validatedData = $request->validate([
			'board_hash_key' => 'required',
			'event_hash_key' => 'required',
			'status' => 'required',
		]);

		// ステータス変更
		try {
			$board_hash_key = $request->input("board_hash_key");
			$command = new StatusChangeCommand($request->input("event_hash_key"), $request->input("status"));
			EventApplicationService::statusChange($command);

			return redirect()->route('events', ['hash_key' => $board_hash_key]);
		} catch (Exception $e) {
			throw new Exception($e);
		}

	}

	public function eventDelete(Request $request) {
		// パラメータチェック
		$validatedData = $request->validate([
			'board_hash_key' => 'required',
			'event_hash_key' => 'required',
		]);

		// 削除
		try {
			$board_hash_key = $request->input("board_hash_key");
			$command = new EventDeleteCommand($request->input("event_hash_key"));
			EventApplicationService::delete($command);

			return redirect()->route('events', ['hash_key' => $board_hash_key]);
		} catch (Exception $e) {
			throw new Exception($e);
		}


		return redirect('events');
	}	

}
