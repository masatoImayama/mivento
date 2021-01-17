<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * ボードの説明 ValueObject
 */
class boardDescription
{
    private $_boardDescription;

    public function getValue() {
        return $this->_boardDescription;
    }


    private function __construct($boardDescription)
    {
        $this->_boardDescription = $boardDescription;
    }

    // 新規設定用
    public static function SetNew($boardDescription) {
        if (!self::IsValid($boardDescription)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($boardDescription);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($boardDescription) {
        return new self($boardDescription);
    }

    private static function IsValid($boardDescription) {
        $validator = Validator::make(['boardDescription' => $boardDescription], [
            'boardDescription' => 'string|max:5000',
        ]);

        return !$validator->fails();
    }

}