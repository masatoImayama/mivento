<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Domain\ValueObject\userId;

use App\Repositories\BoardRepository;
use App\Http\DTO\boardDTO;

use App\ApplicationService\BoardApplicationService;
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
	}	
}
