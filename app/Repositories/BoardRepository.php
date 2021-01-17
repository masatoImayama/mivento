<?php

namespace App\Repositories;

use App\Models\Board;

use App\Domain\Entity\BoardEntity;

use App\Domain\ValueObject\userId;
use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\boardName;
use App\Domain\ValueObject\boardDescription;

class BoardRepository
{
    public static function getBoardList(userId $userId) {
        $user_boards = Board::where('created_by', $userId->getValue())->get();

        $rtn_collection = collect();
        foreach ($user_boards as $key => $val) {
            $board = BoardEntity::Reconstruct(
                boardHashCode::Reconstruct($val->hash_key),
                boardName::Reconstruct($val->board_name),
                boardDescription::Reconstruct($val->description)
            );
            $rtn_collection->push($board);
        }

        return $rtn_collection;
    }
}