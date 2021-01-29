<?php

namespace App\Repositories;

use App\Models\Board;

use App\Domain\Entity\BoardEntity;

use App\Domain\ValueObject\userId;
use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\boardName;
use App\Domain\ValueObject\boardDescription;
use App\Domain\ValueObject\boardStatus;

class BoardRepository
{
    public static function getBoardList(userId $userId) {
        $user_boards = Board::where('created_by', $userId->getValue())->get();

        $rtn_collection = collect();
        foreach ($user_boards as $key => $val) {
            $board = self::boardEntityReconstruct($val);
            $rtn_collection->push($board);
        }

        return $rtn_collection;
    }

    public static function find($hash_code) {
        $board = Board::where('hash_key', $hash_code)->first();

        if ($board === null) {
            return null;
        }

        return self::boardEntityReconstruct($board);
    }

    public static function update(BoardEntity $boardEntity) {
        $board = Board::where('hash_key', $boardEntity->getBoardHashCode()->getValue())->first();
        $board->board_name = $boardEntity->getboardName()->getValue();
        $board->description = $boardEntity->getboardDescription()->getValue();
        $board->status = $boardEntity->getStatus()->getValue();
        $board->save();
    }

    public static function delete(BoardEntity $boardEntity) {
        $board = Board::where('hash_key', $boardEntity->getBoardHashCode()->getValue())->first();
        $board->delete();
    }

    private static function boardEntityReconstruct($board) {
        return BoardEntity::Reconstruct(
            boardHashCode::Reconstruct($board->hash_key),
            boardName::Reconstruct($board->board_name),
            boardDescription::Reconstruct($board->description),
            boardStatus::Reconstruct($board->status));
    }
}