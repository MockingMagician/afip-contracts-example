<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\LevelInterface;

class Level implements LevelInterface
{
    /**
     * @var string
     */
    private $level;

    public function __construct(string $level)
    {
        $this->level = $level;
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}
