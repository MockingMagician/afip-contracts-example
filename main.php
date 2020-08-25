<?php

use Afip\NumberGame\ColorsHelpers;
use Afip\NumberGame\ErrorManager;
use Afip\NumberGame\Game;
use Afip\NumberGame\Helper;
use Afip\NumberGame\Level;

require_once __DIR__ . '/vendor/autoload.php';

$min = 0;
$max = 100;
$errorManager = new ErrorManager(new ColorsHelpers(), $min, $max);
$game = new Game(
    new Helper(),
    new Level($errorManager, 0, 10, 5),
    $errorManager,
    new ColorsHelpers(),
    $min,
    $max
);

$game->start();
