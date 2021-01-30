<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * イベント名 ValueObject
 */
class eventName
{
    private $_eventName;

    public function getValue() {
        return $this->_eventName;
    }


    private function __construct($eventName)
    {
        $this->_eventName = $eventName;
    }

    // 新規設定用
    public static function SetNew($eventName) {
        if (!self::IsValid($eventName)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($eventName);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($eventName) {
        return new self($eventName);
    }

    private static function IsValid($eventName) {
        $validator = Validator::make(['eventName' => $eventName], [
            'eventName' => 'string|max:50',
        ]);

        return !$validator->fails();
    }

}