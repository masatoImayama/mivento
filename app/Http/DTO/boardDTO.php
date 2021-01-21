<?php

namespace App\Http\DTO;

use App\Domain\Entity\BoardEntity;

class boardDTO
{
	public static function convert(BoardEntity $board)
	{        
        $arr = array(
            "hash_key" => $board->getBoardHashCode()->getValue(),
            "board_name" => $board->getBoardName()->getValue(),
            "description" => $board->getBoardDescription()->getValue(),
        );

        return $arr;
	}
}