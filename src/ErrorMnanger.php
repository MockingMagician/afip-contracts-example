<?php

namespace Afip\NumberGame;

use Afip\NumberGame\Contracts\ErrorManagerInterface;
use Afip\NumberGame\Contracts\GameErrorInterface;
use Afip\NumberGame\Contracts\GameInterface;
use Afip\NumberGame\Contracts\LevelInterface;
use Afip\NumberGame\Contracts\HelperInterface;

use GameError;

class ErrorManager implements ErrorManagerInterface
{
    private const REGEX = "0|[1-9]{1,2}|[100]";

    public function checkLevel(string $level): void
    {
        if (!in_array($level, LevelInterface::levels))
        {
            throw new GameError();
        }
    }

    public function checkInput(string $input): void
    {
        if (!preg_match(self::REGEX, $input))
        {
            throw new GameError("") ;
        }
    }
}