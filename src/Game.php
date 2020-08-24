<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\ErrorManagerInterface;
use Afip\NumberGame\Contracts\GameErrorInterface;
use Afip\NumberGame\Contracts\GameInterface;
use Afip\NumberGame\Contracts\HelperInterface;
use Afip\NumberGame\Contracts\LevelInterface;

class Game implements GameInterface
{
    /**
     * @var int
     */
    private $mysteryNumber;
    /**
     * @var int
     */
    private $min;
    /**
     * @var int
     */
    private $max;
    /**
     * @var HelperInterface
     */
    private $helper;
    /**
     * @var int
     */
    private $maxAttempts = 0;
    /**
     * @var int
     */
    private $countAttempts = 0;
    /**
     * @var LevelInterface
     */
    private $level;

    private const FAIL_END_MESSAGE = "After %s attempts, you don't find the number `%s`";
    private const SUCCESS_END_MESSAGE = "Tada! You find the number `%s` after %s attempt, so a genius";
    /**
     * @var ErrorManagerInterface
     */
    private $errorManager;


    public function __construct(
        HelperInterface $helper,
        LevelInterface $level,
        ErrorManagerInterface $errorManager,
        int $minToFind,
        int $maxToFind
    ) {
        $this->min = $minToFind;
        $this->max = $maxToFind;
        $this->helper = $helper;
        $this->level = $level;
        $this->errorManager = $errorManager;
    }

    public function start(): void
    {
        $this->selectLevel();
        $this->helper->output(sprintf('Guess a number between %s and %s', $this->min, $this->max));
        $this->mysteryNumber = $this->helper->getRandomNumberBetween($this->min, $this->max);
        $this->turn();
    }

    private function selectLevel()
    {
        while(true) {
            $level = $this->helper->getInput(sprintf(
                'Choose level difficulty: %s',
                implode(',', LevelInterface::levels)
            ));

            try {
                $this->level->setLevel($level);
            } catch (GameErrorInterface $exception) {
                $this->helper->output($exception->getMessage());
                continue;
            }

            break;
        }
    }

    private function turn(): void
    {
        if ($this->maxAttemptReached()) {
            $this->end(sprintf(self::FAIL_END_MESSAGE, $this->countAttempts, $this->mysteryNumber));
        }

        do {
            $numberToTry = $this->helper->getInput('Give a try number: ');

            try {
                $this->errorManager->checkInput($numberToTry);
            } catch (GameErrorInterface $exception) {
                $this->helper->output($exception->getMessage());
                continue;
            }

            break;
        } while(true);

        $this->countAttempts++;

        if ($this->mysteryNumber === $numberToTry) {
            return $this->end(sprintf(self::SUCCESS_END_MESSAGE, $this->mysteryNumber, $this->countAttempts));
        }

        $this->helper->output(sprintf('%s is not the mysterious number', $numberToTry));

        $this->turn();
    }

    private function end(string $message)
    {
        $this->helper->output($message);
    }

    private function maxAttemptReached(): bool
    {
        if ($this->level->getMaxAttempts() < 1) {
            return false;
        }

        if ($this->countAttempts < $this->level->getMaxAttempts()) {
            return false;
        }

        return true;
    }
}
