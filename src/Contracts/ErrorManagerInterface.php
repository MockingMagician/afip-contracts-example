<?php


namespace Afip\NumberGame\Contracts;


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
