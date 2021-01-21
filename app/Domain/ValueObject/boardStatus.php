<?php

namespace App\Domain\ValueObject;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Config;

/**
 * ボードステータス ValueObject
 */
class boardStatus
{
    private $_boardStatus;

    public function getValue() {
        return $this->_boardStatus;
    }


    private function __construct($boardStatus)
    {
        $this->_boardStatus = $boardStatus;
    }

    // 新規設定用
    public static function SetNew($boardStatus) {
        if (!self::IsValid($boardStatus)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($boardStatus);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct($boardStatus) {
        return new self($boardStatus);
    }

    private static function IsValid($boardStatus) {
        $validator = Validator::make(['boardStatus' => $boardStatus], [
            'boardStatus' => [
                'integer',
                Rule::in([Config::get('const.status.open'),Config::get('const.status.close')]),
            ],
        ]);

        return !$validator->fails();
    }

}