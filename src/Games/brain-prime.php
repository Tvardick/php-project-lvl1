<?php

namespace BrainGames\Project\Prime;

use function BrainGames\Project\Engine\gameFlow;

const HELLO = "Answer \"yes\" if the number is prime, otherwise answer \"no\".";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(HELLO, $task);
}

function checkTask(int $num): bool
{
    if ($num < 2) {
        return false;
    }
        $highestIntegralSquareRoot = floor(sqrt($num));
    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i === 0) {
             return false;
        }
    }
    return true;
}

function getTask(): array
{
    $task = [];
    $task["question"] = rand(1, 100);
    $answer = checkTask($task["question"]);
    $task["expectedAnswer"] = $answer ? "yes" : "no";
    return $task;
}
