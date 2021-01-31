<?php

namespace App\Http\DTO;

use App\Domain\Entity\BoardEntity;
use App\Http\DTO\eventDTO;

class boardDTO
{
	public static function convert(BoardEntity $board)
	{
        $events = collect();
        foreach ($board->getEvents() as $event) {
            $events->push(eventDTO::convert($event));
        }

        $arr = array(
            "hash_key" => $board->getBoardHashCode()->getValue(),
            "board_name" => $board->getBoardName()->getValue(),
            "description" => $board->getBoardDescription()->getValue(),
            "status" => $board->getStatus()->getValue(),
            "events" => $events
        );

        return $arr;
	}
}