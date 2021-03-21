<?php

namespace BrainGames\Project\Prime;

use function BrainGames\Project\Engine\getResultGame;

const TASKED_QUESTION = "Answer \"yes\" if the number is prime, otherwise answer \"no\".";

function startGame(): void
{
    $task = fn() => getTask();
    getResultGame(TASKED_QUESTION, $task);
}

function isPrimeNumber(int $num): bool
{
    if ($num < 2) {
        return false;
    }
        $squareRoot = floor(sqrt($num));
    for ($i = 2; $i <= $squareRoot; $i++) {
        if ($num % $i === 0) {
             return false;
        }
    }
    return true;
}

function getTask(): array
{
    $task = [];
    $task[] = rand(1, 100);
    $task[] = isPrimeNumber($task[0]) ? "yes" : "no";
    return $task;
}
