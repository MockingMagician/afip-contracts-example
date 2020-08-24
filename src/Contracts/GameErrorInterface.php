<?php

declare(strict_types=1);

namespace Afip\NumberGame\Contracts;

use Doctrine\Instantiator\Exception\ExceptionInterface;

/**
 * Interface GameErrorInterface
 * @package Afip\NumberGame\Contracts
 *
 * A custom game error
 */
interface GameErrorInterface extends \Throwable
{
}
