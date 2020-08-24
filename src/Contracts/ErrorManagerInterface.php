<?php

declare(strict_types=1);

namespace Afip\NumberGame\Contracts;

/**
 * Interface ErrorManagerInterface
 * @package Afip\NumberGame\Contracts
 *
 * Check the validity of user inputs
 */
interface ErrorManagerInterface
{
    /**
     * Should throw an error on fail
     *
     * @throws GameErrorInterface
     * @param string $level
     */
    public function checkLevel(string $level): void;

    /**
     * Should throw an error on fail
     *
     * @throws GameErrorInterface
     * @param string $input
     */
    public function checkInput(string $input): void;
}
