<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * イベントのハッシュコード ValueObject
 */
class eventHashCode
{
    private $_eventHashCode;

    public function getValue() {
        return $this->_eventHashCode;
    }


    private function __construct($eventHashCode)
    {
        $this->_eventHashCode = $eventHashCode;
    }

    // 新規設定用
    public static function SetNew(userId $userId) {
        // 現在年月日時分秒&ユーザーIDのMD5ハッシュ値を取得
        $key_hash = md5(date('ymdhis').$userId->getValue());

        return new self($key_hash);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($eventHashCode) {
        return new self($eventHashCode);
    }

    // private static function IsValid($eventHashCode) {
    //     $validator = Validator::make(['eventHashCode' => $eventHashCode], [
    //         'eventHashCode' => 'string|max:255',
    //     ]);

    //     return !$validator->fails();
    // }

}