<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\HelperInterface;
use Afip\NumberGame\Contracts\LevelInterface;

class Level implements LevelInterface
{
    /**
     * @var string
     */
    private $level;
    /**
     * @var int[]
     */
    private $maxAttempts = [];
    /**
     * @var HelperInterface
     */
    private $helper;

    public function __construct(HelperInterface $helper, int $maxAttemptForEasy, int $maxAttemptForMedium, int $maxAttemptForHard)
    {
        $this->maxAttempts[self::levels[0]] = $maxAttemptForEasy;
        $this->maxAttempts[self::levels[1]] = $maxAttemptForMedium;
        $this->maxAttempts[self::levels[2]] = $maxAttemptForHard;
        $this->helper = $helper;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): string
    {

    }

    public function getMaxAttempts(): string
    {
        return $this->maxAttempts[$this->level];
    }
}
