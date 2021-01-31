<?php
namespace App\ApplicationService\Commands;

use Exception;


class EventRegistCommand
{
    private $board_hash_code;
    private $event_name;
    private $description;
    private $event_start_datetime;
    private $event_end_datetime;

    function __construct($board_hash_code, $event_name, $description, $event_start_datetime, $event_end_datetime) 
    {
        $this->board_hash_code = $board_hash_code;
        $this->event_name = $event_name;
        $this->description = $description;
        $this->event_start_datetime = $event_start_datetime;
        $this->event_end_datetime = $event_end_datetime;
    }

    public function getBoardHashCode() {
        return $this->board_hash_code;
    }

    public function getEventName() {
        return $this->event_name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getEventStartDatetime() {
        return $this->event_start_datetime;
    }

    public function getEventEndDatetime() {
        return $this->event_end_datetime;
    }
}