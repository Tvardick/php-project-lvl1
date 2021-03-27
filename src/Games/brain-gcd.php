<?php

namespace BrainGames\Project\Gcd;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function startGame(): void
{
    $getTask = fn() => initTask();
    runGame(TASK_DESCRIPTION, $getTask);
}

function initTask(): array
{
    $firstNum = rand(1, 100);
    $secondNum = rand(1, 100);
    return getTask($firstNum, $secondNum);
}

function getTask(int $firstNum, int $secondNum): array
{
    $task = [];
    $task[] = "{$firstNum} {$secondNum}";
    $task[] = (string)getCommonDivisor($firstNum, $secondNum);
    return $task;
}

function getCommonDivisor(int $numOne, int $numTwo): int
{
    while ($numOne !== 0 && $numTwo !== 0) {
        if ($numOne > $numTwo) {
            $numOne = $numOne % $numTwo;
        } else {
            $numTwo = $numTwo % $numOne;
        }
    }
    return $numOne + $numTwo;
}
