<?php

use Afip\NumberGame\ColorsHelpers;
use Afip\NumberGame\ErrorManager;
use Afip\NumberGame\Game;
use Afip\NumberGame\Helper;
use Afip\NumberGame\Level;

require_once __DIR__ . '/vendor/autoload.php';

$min = 0; // min to find
$max = 100; // max to find
$errorManager = new ErrorManager(new ColorsHelpers(), $min, $max); // Initialize error manager
$game = new Game( // Initialize game
    new Helper(),
    new Level($errorManager, 0, 10, 5), // Initialize level manager
    $errorManager,
    new ColorsHelpers(),
    $min,
    $max
);

$game->start(); // Start the game
