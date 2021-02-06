<?php

namespace BrainGames\Project\Gcd;

use function BrainGames\Project\Engine\gameFlow;

function findCommonDivider(): void
{
    $currentRound = 1;
    $limitMaxRounds = 3;
    $data = [];
    $hello = "Find the greatest common divisor of given numbers.";
    while ($currentRound <= $limitMaxRounds) {
            $firstNum = rand(1, 100);
            $secondNum = rand(1, 100);
            $rigthAnswer = getCommonDivider($firstNum, $secondNum);
            $combinationNum = "{$firstNum} {$secondNum}";
            $data[] = $combinationNum;
            $data[] = $rigthAnswer;
            $currentRound += 1;
    }
    $sendData = gameFlow($hello, $data);
}

function getCommonDivider(int $numOne, int $numTwo): int
{
    while ($numOne != 0 && $numTwo != 0) {
        if ($numOne > $numTwo) {
            $numOne = $numOne % $numTwo;
        } else {
            $numTwo = $numTwo % $numOne;
        }
    }
        return $numOne + $numTwo;
}
