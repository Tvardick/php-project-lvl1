<?php

namespace BrainGames\Project\Prime;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "Answer \"yes\" if the number is prime, otherwise answer \"no\".";

function startGame(): void
{
    $getTask = fn() => getTask();
    runGame(TASK_DESCRIPTION, $getTask);
}

function isPrimeNumber(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    $maxDivisor = floor(sqrt($num));
    for ($i = 2; $i <= $maxDivisor; $i++) {
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
