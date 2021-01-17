<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * ボードのハッシュコード ValueObject
 */
class boardHashCode
{
    private $_boardHashCode;

    public function getValue() {
        return $this->_boardHashCode;
    }


    private function __construct($boardHashCode)
    {
        $this->_boardHashCode = $boardHashCode;
    }

    // 新規設定用
    public static function SetNew() {
        // TODO:現在年月日時分秒のMD5ハッシュ値を取得
        $key_hash = md5(date('ymdhis'));

        return new self($key_hash);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($boardHashCode) {
        return new self($boardHashCode);
    }

    // private static function IsValid($boardHashCode) {
    //     $validator = Validator::make(['boardHashCode' => $boardHashCode], [
    //         'boardHashCode' => 'string|max:255',
    //     ]);

    //     return !$validator->fails();
    // }

}