<?php
namespace App\ApplicationService\Commands;

use Exception;


class EventRegistCommand
{
    private $event_name;
    private $description;
    private $event_start_datetime;
    private $event_end_datetime;

    function __construct($event_name, $description, $event_start_datetime, $event_end_datetime) 
    {
        $this->event_name = $event_name;
        $this->description = $description;
        $this->event_start_datetime = $event_start_datetime;
        $this->event_end_datetime = $event_end_datetime;
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