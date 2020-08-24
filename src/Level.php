<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\ErrorManagerInterface;
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
    /**
     * @var ErrorManagerInterface
     */
    private $errorManager;

    public function __construct(
        ErrorManagerInterface $errorManager,
        int $maxAttemptForEasy,
        int $maxAttemptForMedium,
        int $maxAttemptForHard
    ) {
        $this->maxAttempts[self::levels[0]] = $maxAttemptForEasy;
        $this->maxAttempts[self::levels[1]] = $maxAttemptForMedium;
        $this->maxAttempts[self::levels[2]] = $maxAttemptForHard;
        $this->errorManager = $errorManager;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @inheritDoc
     */
    public function setLevel(string $level)
    {
        $this->errorManager->checkLevel($level);
        $this->level = $level;
    }

    public function getMaxAttempts(): string
    {
        return $this->maxAttempts[$this->level];
    }
}
