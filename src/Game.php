<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\GameInterface;
use Afip\NumberGame\Contracts\HelperInterface;

class Game implements GameInterface
{
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

    public function __construct(string $level, int $min, int $max, HelperInterface $helper)
    {
        $this->min = $min;
        $this->max = $max;
        $this->helper = $helper;
    }


    public function start(): void
    {
        $this->helper->output(sprintf('Devine un nombre entre %s et %s', $this->min, $this->max));
    }
}
