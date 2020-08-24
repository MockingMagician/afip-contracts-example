<?php

declare(strict_types=1);

namespace Afip\NumberGame\Contracts;


interface LevelInterface
{
    public const levels = [
        'easy',
        'medium',
        'hard'
    ];

    public function setLevel(string $level): string;
    public function getLevel(): string;
    public function getMaxAttempts(): string;
}
