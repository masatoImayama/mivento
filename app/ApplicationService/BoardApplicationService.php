<?php
namespace App\ApplicationService;

use Exception;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

use App\ApplicationService\Commands\BoardRegistCommand;
use App\ApplicationService\Commands\BoardStatusChangeCommand;
use App\ApplicationService\Commands\BoardDeleteCommand;

use App\Domain\Entity\BoardEntity;
use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\boardName;
use App\Domain\ValueObject\boardDescription;
use App\Domain\ValueObject\boardStatus;

use App\Domain\ValueObject\userId;

use App\Repositories\BoardRepository;

class BoardApplicationService
{

    public static function addBoard(BoardRegistCommand $command) {
        try {
            $board = BoardEntity::SetNew(
                boardHashCode::SetNew(userId::SetNew(Auth::user()->id)),
                boardName::SetNew($command->getBoardName()),
                boardDescription::SetNew($command->getDescription()),
                boardStatus::SetNew(Config::get('const.status.open')) // デフォルトは「公開」状態
            );

            $userId = userId::Reconstruct(Auth::user()->id);
            BoardRepository::add($userId, $board);

        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function updateBoard($hashcode, BoardRegistCommand $command) {
        try {
            // 対象のボードを検索
            $board = BoardRepository::find($hashcode);
            if ($board === null) {
                throw new Exception("board not found.");
            }

            if ($command->getBoardName() !== null) {
                $board->setBoardName($command->getBoardName());
            }

            if ($command->getDescription() !== null) {
                $board->setBoardDescription($command->getDescription());
            }

            $userId = userId::Reconstruct(Auth::user()->id);
            BoardRepository::save($userId, $board);
            
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function statusChange(BoardStatusChangeCommand $command) {
        try {
            // 対象のボードを検索
            $board = BoardRepository::find($command->getHashKey());

            if ($board === null) {
                throw new Exception("board not found.");
            }

            // ステータス変更
            $board->statusChange($command->getStatus());

            $userId = userId::Reconstruct(Auth::user()->id);
            BoardRepository::save($userId, $board);

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