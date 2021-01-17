<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * ユーザ名 ValueObject
 */
class userName
{
    private $_userName;

    public function getValue() {
        return $this->_userName;
    }


    private function __construct($userName)
    {
        $this->_userName = $userName;
    }

    // 新規設定用
    public static function SetNew($userName) {
        if (!self::IsValid($userName)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($userName);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($userName) {
        return new self($userName);
    }

    private static function IsValid($userName) {
        $validator = Validator::make(['userName' => $userName], [
            'userName' => 'string',
        ]);

        return !$validator->fails();
    }

}