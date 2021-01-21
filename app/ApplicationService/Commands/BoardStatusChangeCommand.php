<?php
namespace App\ApplicationService\Commands;

use Exception;


class BoardStatusChangeCommand
{
    private $hash_key;
    private $status;

    function __construct($hash_key, $status) 
    {
        $this->hash_key = $hash_key;
        $this->status = $status;
    }

    public function getHashKey() {
        return $this->hash_key;
    }

    public function getStatus() {
        return $this->status;
    }
}