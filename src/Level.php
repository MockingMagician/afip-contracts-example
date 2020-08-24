<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\LevelInterface;

class Level implements LevelInterface
{
    /**
     * @var string
     */
    private $level;
    /**
     * @var int
     */
    private $maxAttemptForEasy;
    /**
     * @var int
     */
    private $maxAttemptForMedium;
    /**
     * @var int
     */
    private $maxAttemptForHard;

    public function __construct(int $maxAttemptForEasy, int $maxAttemptForMedium, int $maxAttemptForHard)
    {
        $this->maxAttemptForEasy = $maxAttemptForEasy;
        $this->maxAttemptForMedium = $maxAttemptForMedium;
        $this->maxAttemptForHard = $maxAttemptForHard;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): string
    {
        // TODO: Implement setLevel() method.
    }

    public function getMaxAttempts(): string
    {
        // TODO: Implement getMaxAttempts() method.
    }
}
