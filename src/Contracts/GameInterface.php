<?php

declare(strict_types=1);

namespace Afip\NumberGame\Contracts;


interface GameInterface
{
    /**
     * Just start the game
     */
    public function start(): void;
}
