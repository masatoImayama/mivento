<?php
namespace App\ApplicationService;

use Exception;

use App\ApplicationService\Commands\BoardStatusChangeCommand;
use App\ApplicationService\Commands\BoardDeleteCommand;


use App\Repositories\BoardRepository;

class BoardApplicationService
{
    public static function statusChange(BoardStatusChangeCommand $command) {
        try {
            // 対象のボードを検索
            $board = BoardRepository::find($command->getHashKey());

            if ($board === null) {
                throw new Exception("board not found.");
            }

            // ステータス変更
            $board->statusChange($command->getStatus());

            BoardRepository::update($board);

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function delete(BoardDeleteCommand $command) {
        try {
            // 対象のボードを検索
            $board = BoardRepository::find($command->getHashKey());

            if ($board === null) {
                throw new Exception("board not found.");
            }

            // ステータス変更
            BoardRepository::delete($board);

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}