<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * イベントの説明 ValueObject
 */
class eventDescription
{
    private $_eventDescription;

    public function getValue() {
        return $this->_eventDescription;
    }


    private function __construct($eventDescription)
    {
        $this->_eventDescription = $eventDescription;
    }

    // 新規設定用
    public static function SetNew($eventDescription) {
        if (!self::IsValid($eventDescription)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($eventDescription);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($eventDescription) {
        return new self($eventDescription);
    }

    private static function IsValid($eventDescription) {
        $validator = Validator::make(['eventDescription' => $eventDescription], [
            'eventDescription' => 'string|max:5000',
        ]);

        return !$validator->fails();
    }

}