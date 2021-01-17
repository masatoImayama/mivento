<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * ユーザID ValueObject
 */
class userId
{
    private $_userId;

    public function getValue() {
        return $this->_userId;
    }


    private function __construct($userId)
    {
        $this->_userId = $userId;
    }

    // 新規設定用
    public static function SetNew($userId) {
        if (!self::IsValid($userId)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($userId);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($userId) {
        return new self($userId);
    }

    private static function IsValid($userId) {
        $validator = Validator::make(['userId' => $userId], [
            'userId' => 'integer',
        ]);

        return !$validator->fails();
    }

}