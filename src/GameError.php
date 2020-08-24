<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\GameErrorInterface;
use Throwable;

class GameError extends \Exception implements GameErrorInterface
{
}
