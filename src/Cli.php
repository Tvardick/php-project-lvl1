<?php

namespace BrainGames\Project\Cli;

use function cli\prompt;
use function cli\line;

function askName(): string
{
    line("Welcome Brain Game!");
    $nameUser = prompt("May I have your name?");
    line("Hello, %s!", $nameUser);
    return $nameUser;
}
