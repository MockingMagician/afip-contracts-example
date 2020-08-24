<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\GameInterface;
use Afip\NumberGame\Contracts\HelperInterface;

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
    private $countAttempts = 0;

    public function __construct(string $level, int $min, int $max, HelperInterface $helper)
    {
        $this->min = $min;
        $this->max = $max;
        $this->helper = $helper;
    }

    public function start(): void
    {
        $this->helper->output(sprintf('Devine un nombre entre %s et %s', $this->min, $this->max));
        $this->mysteryNumber = $this->helper->getRandomNumberBetween($this->min, $this->max);
        $this->turn();
    }

    private function turn()
    {
        /**
         * Ici un tour doit se jouer
         */
    }

    private function end()
    {
        /**
         * Ici on peut dire au revoir à l'utilisateur
         */
    }
}
