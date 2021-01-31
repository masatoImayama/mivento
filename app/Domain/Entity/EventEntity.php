<?php

namespace App\Domain\Entity;

use Exception;
use Illuminate\Support\Facades\Validator;

use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\eventHashCode;
use App\Domain\ValueObject\eventName;
use App\Domain\ValueObject\eventDescription;
use App\Domain\ValueObject\eventStartDatetime;
use App\Domain\ValueObject\eventEndDatetime;
use App\Domain\ValueObject\status;

/**
 * イベント Entity
 */
class EventEntity
{
    private $_boardHashCode;
    private $_eventHashCode;
    private $_eventName;
    private $_eventDescription;
    private $_status;
    private $_eventStartDatetime;
    private $_eventEndDatetime;

    private function __construct(boardHashCode $boardHashCode, eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime, status $status)
    {
        $this->_boardHashCode = $boardHashCode;
        $this->_eventHashCode = $eventHashCode;
        $this->_eventName = $eventName;
        $this->_eventDescription = $eventDescription;
        $this->status = $status;
        $this->_eventStartDatetime = $eventStartDatetime;
        $this->_eventEndDatetime = $eventEndDatetime;
    }

    // 新規設定用
    public static function SetNew(boardHashCode $boardHashCode, eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime, status $status) {
        if (!self::IsValid($boardHashCode,$eventHashCode, $eventName, $eventDescription, $eventStartDatetime, $eventEndDatetime, $status)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($boardHashCode,$eventHashCode, $eventName, $eventDescription, $eventStartDatetime, $eventEndDatetime, $status);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct(boardHashCode $boardHashCode, eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime, status $status) {
        return new self($boardHashCode,$eventHashCode, $eventName, $eventDescription, $eventStartDatetime, $eventEndDatetime, $status);
    }

    private static function IsValid(boardHashCode $boardHashCode, eventHashCode $eventHashCode, eventName $eventName, eventDescription $eventDescription, eventStartDatetime $eventStartDatetime, eventEndDatetime $eventEndDatetime, status $status) {
        // すべてVOのためチェック不要
        return true;
    }


    // ---------------------
    // 公開メソッド
    // ---------------------
    public function getBoardHashCode() {
        return $this->_boardHashCode;
    }

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

    public function getStatus() {
        return $this->_status;
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

    public function statusChange($status) {
        $board_status = status::SetNew($status);
        $this->_status = $board_status;
    }

}