<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\HelperInterface;

class Helper implements HelperInterface
{
    public function getRandomNumberBetween(int $min, int $max): int
    {
        return mt_rand($min, $max);
    }

    public function getInput(?string $toPromptBeforeInput = null): string
    {
        return readline($toPromptBeforeInput);
    }

    public function output(string $toPrompt)
    {
        echo $toPrompt;
    }
}
