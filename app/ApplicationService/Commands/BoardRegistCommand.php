<?php
namespace App\ApplicationService\Commands;

use Exception;


class BoardRegistCommand
{
    private $board_name;
    private $description;


    function __construct($board_name, $description) 
    {
        $this->board_name = $board_name;
        $this->description = $description;
    }

    public function getBoardName() {
        return $this->board_name;
    }

    public function getDescription() {
        return $this->description;
    }

}