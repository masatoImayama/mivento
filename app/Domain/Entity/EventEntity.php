<?php

namespace App\Domain\Entity;

use Exception;
use Illuminate\Support\Facades\Validator;

use App\Domain\ValueObject\eventHashCode;
use App\Domain\ValueObject\eventName;
use App\Domain\ValueObject\eventDescription;
use App\Domain\ValueObject\eventStartDatetime;
use App\Domain\ValueObject\eventEndDatetime;

/**
 * イベント Entity
 */
class EventEntity
{
    private $_eventHashCode;
    private $_eventName;
    private $_eventDescription;
    private $_eventStartDatetime;
    private $_eventEndDatetime;

    private function __construct(eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime)
    {
        $this->_eventHashCode = $eventHashCode;
        $this->_eventName = $eventName;
        $this->_eventDescription = $eventDescription;
    }

    // 新規設定用
    public static function SetNew(eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime) {
        if (!self::IsValid($eventHashCode, $eventName, $eventDescription, $eventStartDatetime, $eventEndDatetime)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($eventHashCode, $eventName, $eventDescription, $eventStartDatetime, $eventEndDatetime);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct(eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime) {
        return new self($eventHashCode, $eventName, $eventDescription, $eventStartDatetime, $eventEndDatetime);
    }

    private static function IsValid(eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime) {
        // すべてVOのためチェック不要
        return true;
    }


    // ---------------------
    // 公開メソッド
    // ---------------------
    public function getEventHashCode() {
        return $this->_eventHashCode;
    }

    public function getEventName() {
        return $this->_eventName;
    }

    public function getEventDescription() {
        return $this->_eventDescription;
    }

    public function getEventStartDatetime() {
        return $this->_eventStartDatetime;
    }

    public function getEventEndDatetime() {
        return $this->_eventEndDatetime;
    }

    public function setEventName($name) {
        $event_name = eventName::SetNew($name);
        $this->_eventName = $event_name;
    }

    public function setEventDescription($description) {
        $event_description = eventDescription::SetNew($description);
        $this->_eventDescription = $event_description;
    }

    public function setEventStartDatetime($start_datetime) {
        $event_start_datetime = eventStartDatetime::SetNew($start_datetime);
        $this->_eventStartDatetime = $event_start_datetime;
    }
    
    public function setEventEndDatetime($end_datetime) {
        $event_end_datetime = eventStartDatetime::SetNew($end_datetime);
        $this->_eventEndDatetime = $event_end_datetime;
    }

}