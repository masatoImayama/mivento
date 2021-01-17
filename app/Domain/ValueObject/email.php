<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * メールアドレス ValueObject
 */
class email
{
    private $_email;

    public function getValue() {
        return $this->_email;
    }


    private function __construct($email)
    {
        $this->_email = $email;
    }

    // 新規設定用
    public static function SetNew($email) {
        if (!self::IsValid($email)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($email);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($email) {
        return new self($email);
    }

    private static function IsValid($email) {
        $validator = Validator::make(['email' => $email], [
            // TODO:正規表現でメールアドレスチェック？
            'email' => 'string',
        ]);

        return !$validator->fails();
    }

}