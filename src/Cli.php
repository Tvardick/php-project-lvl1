<?php

namespace BrainGames\Project\Cli;

use function cli\line;
use function cli\prompt;

function helloUser(): string
{
    $hi = line("Welcome Brain Game!");
    $name = prompt("May I have your name?");
    $line = line("Hello, %s!", $name);
    return $name;
}
