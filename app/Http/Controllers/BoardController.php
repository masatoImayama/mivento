<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Domain\ValueObject\userId;

use App\Repositories\BoardRepository;
use App\Http\DTO\boardDTO;

use App\ApplicationService\BoardApplicationService;
use App\ApplicationService\Commands\BoardRegistCommand;
use App\ApplicationService\Commands\BoardStatusChangeCommand;
use App\ApplicationService\Commands\BoardDeleteCommand;

class BoardController extends Controller
{
	public function index()
	{
		// ボード一覧取得
		$userId = userId::Reconstruct(Auth::user()->id);
		$boards = BoardRepository::getBoardList($userId);

		// 画面用に加工
		$boards_collection = collect();
		foreach ($boards as $key => $val) {
			$boards_collection->push(boardDTO::convert($val));
		}

		return view('board.boards')->with([
			'boards' => $boards_collection,
		]);
	}

	public function boardForm($hash_key = null) {
		if ($hash_key === null) {
			// 新規追加
			$board = array();
		} else {
			// 編集
			$board = array();
			$board = BoardRepository::find($hash_key);
			$board = boardDTO::convert($board);
		}

		return view('board.board_form')->with($board);
	}

	public function boardConfirm(Request $request) {
		// チェック処理
		$validatedData = $request->validate([
			'board_name' => 'required|string|max:256',
			'description' => 'nullable|string|max:1500',
		]);

		return view('board.board_confirm')->with($request->all());
	}

	public function boardRegist(Request $request) {
		try {
			if ($request->has('back')) {
				return redirect('board_form')->withInput();
			}

			$command = new BoardRegistCommand($request->input("board_name"), $request->input("description"));
			if (!empty($request->input("hash_key"))) {
				// 更新処理
				BoardApplicationService::updateBoard($request->input("hash_key"), $command);
			} else {
				// 登録処理
				BoardApplicationService::addBoard($command);
			}

			// TODO:完了通知表示用の処理追加？
			return redirect('boards');
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function boardStatusChange(Request $request) {
		// パラメータチェック
		$validatedData = $request->validate([
			'hash_key' => 'required',
			'status' => 'required',
		]);

		// ステータス変更
		try {
			$command = new BoardStatusChangeCommand($request->input("hash_key"), $request->input("status"));
			BoardApplicationService::statusChange($command);

			return redirect('boards');
		} catch (Exception $e) {
			throw new Exception($e);
		}

	}

	public function boardDelete(Request $request) {
		// パラメータチェック
		$validatedData = $request->validate([
			'hash_key' => 'required',
		]);

		// 削除
		try {
			$command = new BoardDeleteCommand($request->input("hash_key"));
			BoardApplicationService::delete($command);

			return redirect('boards');
		} catch (Exception $e) {
			throw new Exception($e);
		}


		return redirect('boards');
	}	
}
