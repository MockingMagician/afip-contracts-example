<?php

namespace Afip\NumberGame;

use Afip\NumberGame\Contracts\HelperInterface;

class Helper implements HelperInterface
{
    public function getRandomNumberBetween(int $min, int $max): int
    {
        if($max < $min){
            $min1 = $min;
            $min = $max;
            $max = $min1;
            return random_int($min,$max);
        }
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