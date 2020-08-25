<?php

namespace Afip\NumberGame;

use Afip\NumberGame\Contracts\HelperInterface;

class Helper implements HelperInterface
{
    public function getRandomNumberBetween(int $min, int $max): int
    {
        return random_int($min,$max);

    }

    public function getInput(?string $toPromptBeforeInput): string
    {
        return readline($toPromptBeforeInput);
    }

    public function output(string $toPrompt)
    {
        echo $toPrompt;

    }
    
}