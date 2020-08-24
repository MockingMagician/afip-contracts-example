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

    public function getLevel(): string;
}
