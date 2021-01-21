<?php

namespace App\Domain\Entity;

use Exception;
use Illuminate\Support\Facades\Validator;

use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\boardName;
use App\Domain\ValueObject\boardDescription;
use App\Domain\ValueObject\boardStatus;

/**
 * ボード Entity
 */
class BoardEntity
{
    private $_boardHashCode;
    private $_boardName;
    private $_boardDescription;
    private $_status;

    private function __construct(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, boardStatus $status)
    {
        $this->_boardHashCode = $boardHashCode;
        $this->_boardName = $boardName;
        $this->_boardDescription = $boardDescription;
        $this->_status = $status;
    }

    // 新規設定用
    public static function SetNew(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, boardStatus $status) {
        if (!self::IsValid($boardHashCode, $boardName, $boardDescription, $status)) {
            throw new Exception("ArgumentInvalidException");
        }

        return new self($boardHashCode, $boardName, $boardDescription, $status);
    }

    // リポジトリからの読み出し用
    public static function Reconstruct(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, boardStatus $status) {
        return new self($boardHashCode, $boardName, $boardDescription, $status);
    }

    private static function IsValid(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, boardStatus $status) {
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

    public function getStatus() {
        return $this->_status;
    }

    public function statusChange($status) {
        $board_status = boardStatus::SetNew($status);
        $this->_status = $board_status;
    }
    
}