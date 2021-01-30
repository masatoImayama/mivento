<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * イベント開始日時 ValueObject
 */
class eventStartDatetime
{
    private $_eventStartDatetime;

    public function getValue() {
        return $this->_eventStartDatetime;
    }

    private function __construct($eventStartDatetime)
    {
        $this->_eventStartDatetime = $eventStartDatetime;
    }

    // 新規設定用
    public static function SetNew($eventStartDatetime) {
        if (!self::IsValid($eventStartDatetime)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($eventStartDatetime);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($eventStartDatetime) {
        return new self($eventStartDatetime);
    }

    private static function IsValid($eventStartDatetime) {
        $validator = Validator::make(['eventStartDatetime' => $eventStartDatetime], [
            'eventStartDatetime' => 'date_format',
        ]);

        return !$validator->fails();
    }

}