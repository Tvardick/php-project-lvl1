<?php

namespace BrainGames\Project\Gcd;

use function BrainGames\Project\Engine\gameFlow;

const HELLO = "Find the greatest common divisor of given numbers.";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(HELLO, $task);
}

function getTask(): array
{
    $task = [];
    $firstNum = rand(1, 100);
    $secondNum = rand(1, 100);
    $combinationNum = "{$firstNum} {$secondNum}";
    $task["question"] = $combinationNum;
    $task["expectedAnswer"] = getAnswer($combinationNum);
    return $task;
}

function getAnswer(string $combination): int
{
    $numOne = intval(substr($combination, 0, 2));
    $numTwo = intval(substr($combination, 2));
    while ($numOne != 0 && $numTwo != 0) {
        if ($numOne > $numTwo) {
            $numOne = $numOne % $numTwo;
        } else {
            $numTwo = $numTwo % $numOne;
        }
    }
        return $numOne + $numTwo;
}
