<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * イベント終了日時 ValueObject
 */
class eventEndDatetime
{
    private $_eventEndDatetime;

    public function getValue() {
        return $this->_eventEndDatetime;
    }

    private function __construct($eventEndDatetime)
    {
        $this->_eventEndDatetime = $eventEndDatetime;
    }

    // 新規設定用
    public static function SetNew($eventEndDatetime) {
        if (!self::IsValid($eventEndDatetime)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($eventEndDatetime);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($eventEndDatetime) {
        return new self($eventEndDatetime);
    }

    private static function IsValid($eventEndDatetime) {
        $validator = Validator::make(['eventEndDatetime' => $eventEndDatetime], [
            'eventEndDatetime' => 'date_format',
        ]);

        return !$validator->fails();
    }

}