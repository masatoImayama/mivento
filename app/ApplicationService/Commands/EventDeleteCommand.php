<?php
namespace App\ApplicationService\Commands;

use Exception;


class EventDeleteCommand
{
    private $hash_key;

    function __construct($hash_key) 
    {
        $this->hash_key = $hash_key;
    }

    public function getHashKey() {
        return $this->hash_key;
    }

}