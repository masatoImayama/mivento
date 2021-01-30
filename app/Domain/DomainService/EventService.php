<?php
namespace App\Domain\Service;

use Exception;

use  App\Domain\Entity\EventEntity;

class EventService
{
    public static function equalsEvent(EventEntity $src, EventEntity $dist) {
        if ($src->getEventHashCode()->getValue() === $dist->getEventHashCode()->getValue()) {
            return true;
        } else {
            return false;
        }
    }

    // TODO:日付範囲チェック？

}