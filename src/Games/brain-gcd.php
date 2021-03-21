<?php

namespace BrainGames\Project\Gcd;

use function BrainGames\Project\Engine\getResultGame;

const TASKED_QUESTION = "Find the greatest common divisor of given numbers.";

function startGame(): void
{
    $task = fn() => getTask();
    getResultGame(TASKED_QUESTION, $task);
}

function getTask(): array
{
    $task = [];
    $firstNum = rand(1, 100);
    $secondNum = rand(1, 100);
    $combinationNum = "{$firstNum} {$secondNum}";
    $task[] = $combinationNum;
    $task[] = getAnswer($combinationNum);
    return $task;
}

function getAnswer(string $combination): string
{
    $numOne = intval(substr($combination, 0, 2));
    $numTwo = intval(substr($combination, 2));
    return getCommonDivisor($numOne, $numTwo);
}

function getCommonDivisor(int $numOne, int $numTwo): string
{
    while ($numOne !== 0 && $numTwo !== 0) {
        if ($numOne > $numTwo) {
            $numOne = $numOne % $numTwo;
        } else {
            $numTwo = $numTwo % $numOne;
        }
    }
    return (string) $numOne + $numTwo;
}
