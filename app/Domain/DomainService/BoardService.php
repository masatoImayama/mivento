<?php
namespace App\Domain\Service;

use Exception;

use  App\Domain\Entity\BoardEntity;

class BoardService
{
    public static function equalsBoard(BoardEntity $src, BoardEntity $dist) {
        if ($src->getBoardHashCode()->getValue() === $dist->getBoardHashCode()->getValue()) {
            return true;
        } else {
            return false;
        }
    }
}