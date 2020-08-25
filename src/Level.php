<?php

declare(strict_types=1);

namespace Afip\NumberGame;

use Afip\NumberGame\Contracts\LevelInterface;

class Level implements LevelInterface 
{
    public $tentative;
    public $possibility;
    public $level;

    public function setLevel(string $lvl): void
    {
        $this->level = $lvl;

        switch ($lvl) {
            case "LevelInterface::levels[2]":
                $this->possibility = 10000;
                break;
            case "LevelInterface::levels[1]":
                $this->possibility = 10;
                break;
            case "LevelInterface::levels[1]":
                $this->possibility = 5;
                break;
        }
    }
    
    public function getLevel(): string
    {
        return $this->level ;
    }


    public function getMaxAttempts(): int
    {  
        return $this->possibility;

    }
}
