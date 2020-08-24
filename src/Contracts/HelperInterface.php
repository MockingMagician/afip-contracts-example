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
    public function getRandomNumberBetween(int $min, int $max): int;
    public function getInput(?string $toPromptBeforeInput): string;
    public function output(string $toPrompt);
}
