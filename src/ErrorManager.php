<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\ErrorManagerInterface;
use Afip\NumberGame\Contracts\LevelInterface;

class ErrorManager implements ErrorManagerInterface
{
    /**
     * @var int
     */
    private $min;
    /**
     * @var int
     */
    private $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @inheritDoc
     */
    public function checkLevel(string $level): void
    {
        if (!in_array($level, LevelInterface::levels)) {
            throw new GameError(sprintf(
                'Level must be one of %s',
                implode(', ', LevelInterface::levels)
            ));
        }
    }

    /**
     * @inheritDoc
     */
    public function checkInput(string $input): void
    {
        if (!$this->stringIsAnInteger($input)) {
            throw new GameError('Do you think "%s" really looks like a number ?');
        }
    }

    private function stringIsAnInteger(string $string): bool
    {
        // Is an integer only if is numeric and both cast are equals float == int
        if (!is_numeric($string)) {
            return false;
        }

        if ((int) $string == (float) $string) {
            return true;
        }

        return false;
    }
}
