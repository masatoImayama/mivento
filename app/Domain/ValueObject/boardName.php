<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * ボード名 ValueObject
 */
class boardName
{
    private $_boardName;

    public function getValue() {
        return $this->_boardName;
    }


    private function __construct($boardName)
    {
        $this->_boardName = $boardName;
    }

    // 新規設定用
    public static function SetNew($boardName) {
        if (!self::IsValid($boardName)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($boardName);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($boardName) {
        return new self($boardName);
    }

    private static function IsValid($boardName) {
        $validator = Validator::make(['boardName' => $boardName], [
            'boardName' => 'string|max:50',
        ]);

        return !$validator->fails();
    }

}