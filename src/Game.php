<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\ErrorManagerInterface;
use Afip\NumberGame\Contracts\GameErrorInterface;
use Afip\NumberGame\Contracts\GameInterface;
use Afip\NumberGame\Contracts\HelperInterface;
use Afip\NumberGame\Contracts\LevelInterface;

class Game implements GameInterface
{
    private const FAIL_END_MESSAGE = "After %s attempts, you miserably fail to find the number `%s`\n";
    private const SUCCESS_END_MESSAGE = "Tada! You find the number `%s` after %s attempt, so a genius!\n";

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
    private $countAttempts = 0;
    /**
     * @var LevelInterface
     */
    private $level;
    /**
     * @var ErrorManagerInterface
     */
    private $errorManager;
    /**
     * @var ColorsHelpers
     */
    private $colorsHelpers;

    public function __construct(
        HelperInterface $helper,
        LevelInterface $level,
        ErrorManagerInterface $errorManager,
        ColorsHelpers $colorsHelpers,
        int $minToFind,
        int $maxToFind
    ) {
        $this->min = $minToFind;
        $this->max = $maxToFind;
        $this->helper = $helper;
        $this->level = $level;
        $this->errorManager = $errorManager;
        $this->colorsHelpers = $colorsHelpers;
    }

    public function start(): void
    {
        $this->selectLevel();
        $this->helper->output(sprintf("Guess a number between %s and %s\n", $this->min, $this->max));
        $this->mysteryNumber = $this->helper->getRandomNumberBetween($this->min, $this->max);
        $this->turn();
    }

    private function selectLevel()
    {
        while(true) {
            $level = $this->helper->getInput(sprintf(
                "Choose level difficulty: %s: ",
                implode(', ', array_map(function ($value) {
                    $color = $value === LevelInterface::levels[0]
                        ? 'green'
                        : (
                            $value === LevelInterface::levels[1]
                            ? 'yellow'
                            : 'red'
                        )
                    ;
                    return $this->colorsHelpers->getColoredString($value, $color);

                }, LevelInterface::levels))
            ));

            try {
                $this->level->setLevel($level);
            } catch (GameErrorInterface $exception) {
                $this->helper->output($exception->getMessage()."\n");
                continue;
            }

            break;
        }
    }

    private function turn(): void
    {
        if ($this->maxAttemptReached()) {
            $this->end($this->colorsHelpers->getColoredString(sprintf(
                self::FAIL_END_MESSAGE,
                $this->countAttempts,
                $this->mysteryNumber
            ), 'red'));
            return;
        }

        do {
            $numberToTry = $this->helper->getInput("\nGive a try number: ");

            try {
                $this->errorManager->checkInput($numberToTry);
            } catch (GameErrorInterface $exception) {
                $this->helper->output($exception->getMessage()."\n");
                continue;
            }

            break;
        } while(true);

        $this->countAttempts++;

        if ($this->mysteryNumber === (int)$numberToTry) {
            $this->end($this->colorsHelpers->getColoredString(sprintf(
                self::SUCCESS_END_MESSAGE,
                $this->mysteryNumber,
                $this->countAttempts
            ), 'green'));
            return;
        }

        $clue = $this->colorsHelpers->getColoredString('lower', 'blue');
        if ($this->mysteryNumber > $numberToTry) {
            $clue = $this->colorsHelpers->getColoredString('bigger', 'red');
        }
        $numberToTry = $this->colorsHelpers->getColoredString($numberToTry, 'yellow');
        $this->helper->output(sprintf("%s is not the mysterious number. Try %s\n", $numberToTry, $clue));

        $this->turn();
    }

    private function end(string $message)
    {
        $this->helper->output($message);
        $this->restart();
    }

    private function restart(): void
    {
        do {
            $response = $this->helper->getInput(sprintf(
                "\nDo you want to replay ? yes(%s) / no(%s): ",
                $this->colorsHelpers->getColoredString('y', 'green'),
                $this->colorsHelpers->getColoredString('n', 'red')
            ));

            if (!in_array($response, ['y', 'n'])) {
                $this->helper->output(sprintf("Hmmm, I don't understand `%s`", $response));
                continue;
            }

            break;
        } while(true);

        if ($response === 'y') {
            $this->countAttempts = 0;
            $this->start();
            return;
        }

        $this->helper->output("See you. Bye!\n");
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
