<?php
namespace App\Domain\Service;

use Exception;

use  App\Domain\Entity\UserEntity;

class UserService
{
    public static function equalsUser(UserEntity $src, UserEntity $dist) {
        if ($src->getUserId()->getValue() === $dist->getUserId()->getValue()) {
            return true;
        } else {
            return false;
        }
    }


}