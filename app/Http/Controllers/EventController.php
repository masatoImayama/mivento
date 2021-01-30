<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Domain\ValueObject\userId;

use App\Repositories\EventRepository;
use App\Http\DTO\eventDTO;

use App\ApplicationService\EventApplicationService;
use App\ApplicationService\Commands\EventRegistCommand;
use App\ApplicationService\Commands\EventDeleteCommand;

class EventController extends Controller
{

	public function index()
	{
		return view('event.events')->with([
		]);
	}

	public function eventForm($hash_key = null) {
		if ($hash_key === null) {
			// 新規追加
			$event = array();
		} else {
			// 編集
			$event = array();
			$event = EventRepository::find($hash_key);
			$event = eventDTO::convert($event);
		}

		return view('event.event_form')->with($event);
	}

	public function eventConfirm(Request $request) {
		// チェック処理
		$validatedData = $request->validate([
			'event_name' => 'required|string|max:256',
			'description' => 'nullable|string|max:1500',
			'event_start_datetime' => 'required|date_format',
			'event_end_datetime' => 'required|date_format|after_or_equal:event_start_datetime',
		]);

		return view('event.event_confirm')->with($request->all());
	}

	public function eventRegist(Request $request) {
		try {
			if ($request->has('back')) {
				return redirect('event_form')->withInput();
			}

			$command = new EventRegistCommand(
				$request->input("event_name"), 
				$request->input("description"),
				$request->input("event_start_datetime"),
				$request->input("event_end_datetime")
			);
			if (!empty($request->input("hash_key"))) {
				// 更新処理
				EventApplicationService::updateEvent($request->input("hash_key"), $command);
			} else {
				// 登録処理
				EventApplicationService::addEvent($command);
			}

			// TODO:完了通知表示用の処理追加？
			return redirect('events');
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function eventDelete(Request $request) {
		// パラメータチェック
		$validatedData = $request->validate([
			'hash_key' => 'required',
		]);

		// 削除
		try {
			$command = new EventDeleteCommand($request->input("hash_key"));
			EventApplicationService::delete($command);

			return redirect('events');
		} catch (Exception $e) {
			throw new Exception($e);
		}


		return redirect('events');
	}	

}
