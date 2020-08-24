<?php


namespace Afip\NumberGame;


use Afip\NumberGame\Contracts\HelperInterface;

class Helper implements HelperInterface
{
    public static function getRandomNumberBetween(int $min, int $max): int
    {
        return mt_rand($min, $max);
    }

    public static function getInput(?string $toPromptBeforeInput = null): string
    {
        return readline($toPromptBeforeInput);
    }

    public static function output(string $toPrompt)
    {
        echo $toPrompt;
    }
}
