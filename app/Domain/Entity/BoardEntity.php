<?php

namespace App\Domain\Entity;

use Exception;
use Illuminate\Support\Facades\Validator;

use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\boardName;
use App\Domain\ValueObject\boardDescription;

/**
 * ボード Entity
 */
class BoardEntity
{
    private $_boardHashCode;
    private $_boardName;
    private $_boardDescription;

    private function __construct(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription)
    {
        $this->_boardHashCode = $boardHashCode;
        $this->_boardName = $boardName;
        $this->_boardDescription = $boardDescription;
    }

    // 新規設定用
    public static function SetNew(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription) {
        if (!self::IsValid($boardHashCode, $boardName, $boardDescription)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($boardHashCode, $boardName, $boardDescription);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription) {
        return new self($boardHashCode, $boardName, $boardDescription);
    }

    private static function IsValid(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription) {
        // すべてVOのためチェック不要
        return true;
    }


    // ---------------------
    // 公開メソッド
    // ---------------------
    public function getBoardHashCode() {
        return $this->_boardHashCode;
    }

    public function getboardName() {
        return $this->_boardName;
    }

    public function getBoardDescription() {
        return $this->_boardDescription;
    }
}