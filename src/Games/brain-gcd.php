<?php

namespace BrainGames\Project\Gcd;

use function BrainGames\Project\Engine\gameFlow;

function startGame(): void
{
    $hello = "Find the greatest common divisor of given numbers.";
    $nameSpace = "BrainGames\Project\Gcd\getAnswer";
    $task = fn() => genTask();
    $start = gameFlow($hello, $task, $nameSpace);
}

function genTask(): string
{
    $firstNum = rand(1, 100);
    $secondNum = rand(1, 100);
    $combinationNum = "{$firstNum} {$secondNum}";
    return $combinationNum;
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
