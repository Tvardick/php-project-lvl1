<?php

namespace BrainGames\Project\Prime;

use function BrainGames\Project\Engine\gameFlow;

const TASK_FOR_WIN = "Answer \"yes\" if the number is prime, otherwise answer \"no\".";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(TASK_FOR_WIN, $task);
}

function getAnswer(int $num): bool
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
    $answer = getAnswer($task[0]);
    $task[] = $answer ? "yes" : "no";
    return $task;
}
