<?php

declare(strict_types=1);

namespace Afip\NumberGame\Contracts;

/**
 * Interface GameInterface
 * @package Afip\NumberGame\Contracts
 *
 * Just the game
 */
interface GameInterface
{
    /**
     * Just start the game
     */
    public function start(): void;
}
