<?php

namespace App\Domain\Entity;

use Exception;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Collection;

use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\boardName;
use App\Domain\ValueObject\boardDescription;
use App\Domain\ValueObject\status;
use App\Domain\Entity\EventEntity;

/**
 * ボード Entity
 */
class BoardEntity
{
    private $_boardHashCode;
    private $_boardName;
    private $_boardDescription;
    private $_status;
    private $_events;

    private function __construct(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, status $status, Collection $events)
    {
        $this->_boardHashCode = $boardHashCode;
        $this->_boardName = $boardName;
        $this->_boardDescription = $boardDescription;
        $this->_status = $status;
        $this->_events = $events;
    }

    // 新規設定用
    public static function SetNew(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, status $status) {
        if (!self::IsValid($boardHashCode, $boardName, $boardDescription, $status)) {
            throw new Exception("ArgumentInvalidException");
        }
        
        // TODO:今のところ、ボードとイベントの同時登録は想定しないため、「$this->_events」には空のコレクションを引き渡し
        return new self($boardHashCode, $boardName, $boardDescription, $status, collect());
    }

    // リポジトリからの読み出し用
    public static function Reconstruct(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, status $status, Collection $events) {
        return new self($boardHashCode, $boardName, $boardDescription, $status, $events);
    }

    private static function IsValid(boardHashCode $boardHashCode, boardName $boardName, boardDescription $boardDescription, status $status) {
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

    public function getEvents() {
        return $this->_events;
    }

    public function statusChange($status) {
        $board_status = status::SetNew($status);
        $this->_status = $board_status;
    }

    public function setBoardName($name) {
        $board_name = boardName::SetNew($name);
        $this->_boardName = $board_name;
    }

    public function setBoardDescription($description) {
        $board_description = boardDescription::SetNew($description);
        $this->_boardDescription = $board_description;
    }
    
}