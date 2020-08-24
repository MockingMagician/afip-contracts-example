<?php

declare(strict_types=1);

namespace Afip\NumberGame\Contracts;

/**
 * Interface LevelInterface
 * @package Afip\NumberGame\Contracts
 *
 * Define level design
 */
interface LevelInterface
{
    public const levels = [
        'easy',
        'medium',
        'hard'
    ];

    /**
     * @param string $level
     * @return string
     * @throws GameErrorInterface
     */
    public function setLevel(string $level): string;
    public function getLevel(): string;
    public function getMaxAttempts(): string;
}
