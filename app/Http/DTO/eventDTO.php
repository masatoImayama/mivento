<?php

namespace App\Http\DTO;

use App\Domain\Entity\EventEntity;

class eventDTO
{
	public static function convert(EventEntity $event)
	{        
        $arr = array(
            "hash_key" => $event->getEventHashCode()->getValue(),
            "event_name" => $event->getEventName()->getValue(),
            "description" => $event->getEventDescription()->getValue(),
            "event_start_datetime" => $event->getEventStartDatetime()->getValue(),
            "event_end_datetime" => $event->getEventEndDatetime()->getValue(),
        );

        return $arr;
	}
}