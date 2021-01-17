<?php

namespace App\Domain\Entity;

use Exception;
use Illuminate\Support\Facades\Validator;

use App\Domain\ValueObject\userId;
use App\Domain\ValueObject\userName;
use App\Domain\ValueObject\email;

/**
 * ユーザー Entity
 */
class UserEntity
{
    private userId $_userId;
    private userName $_userName;
    private email $_email;

    private function __construct(userId $userId, userName $userName, email $email)
    {
        $this->_userId = $userId;
        $this->_userName = $userName;
        $this->_email = $email;
    }

    // 新規設定用
    public static function SetNew(userId $userId, userName $userName, email $email) {
        if (!self::IsValid($userId, $userName, $email)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($userId, $userName, $email);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct(userId $userId, userName $userName, email $email) {
        return new self($userId, $userName, $email);
    }

    private static function IsValid(userId $userId, userName $userName, email $email) {
        // すべてVOのためチェック不要
        return true;
    }


    // ---------------------
    // 公開メソッド
    // ---------------------
    public function getUserId() {
        return $this->_userId;
    }

    public function getUserName() {
        return $this->_userName;
    }

    public function getEmail() {
        return $this->_email;
    }
}