<?php


namespace Afip\NumberGame\Contracts;

/**
 * Interface HelperInterface
 * @package Afip\NumberGame\Contracts
 *
 * This interface design some helpers methods for our game
 */
interface HelperInterface
{
    public static function getRandomNumberBetween(int $min, int $max): int;
    public static function getInput(?string $toPromptBeforeInput): string;
    public static function output(string $toPrompt);
}
