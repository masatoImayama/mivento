<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Config;

/**
 * ボードステータス ValueObject
 */
class status
{
    private $_status;

    public function getValue() {
        return $this->_status;
    }


    private function __construct($status)
    {
        $this->_status = $status;
    }

    // 新規設定用
    public static function SetNew($status) {
        if (!self::IsValid($status)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($status);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($status) {
        return new self($status);
    }

    private static function IsValid($status) {
        $validator = Validator::make(['status' => $status], [
            'status' => [
                'integer',
                Rule::in([Config::get('const.status.open'),Config::get('const.status.close')]),
            ],
        ]);

        return !$validator->fails();
    }

}