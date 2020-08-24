<?php


namespace Afip\NumberGame;


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


    public function __construct(LevelInterface $level, int $min, int $max, HelperInterface $helper)
    {
        $this->min = $min;
        $this->max = $max;
        $this->helper = $helper;
        $this->level = $level;
    }

    public function start(): void
    {
        $this->helper->output(sprintf('Devine un nombre entre %s et %s', $this->min, $this->max));
        $this->mysteryNumber = $this->helper->getRandomNumberBetween($this->min, $this->max);
        $this->turn();
    }

    private function turn()
    {
        $this->ItIsFinished();
        /**
         * Ici un tour doit se jouer
         */
    }

    private function end(string $message)
    {
        /**
         * Ici on peut dire au revoir à l'utilisateur
         */
    }

    private function ItIsFinished(): bool
    {
        if ($this->level->getLevel() === LevelInterface::levels[0] /*easy*/) {
            return false;
        }


    }
}
