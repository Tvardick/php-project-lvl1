<?php

namespace BrainGames\Project\Prime;

use function BrainGames\Project\Engine\gameFlow;

function isPrimeNumber()
{
    $currentRound = 1;
    $limitMaxRounds = 3;
    $hello = "Answer \"yes\" if the number is prime, otherwise answer \"no\".";
    $data = [];
    while ($currentRound <= $limitMaxRounds) {
            $randomNum = rand(1, 100);
            $rigthAnswer = checkPrimeNum($randomNum);
            $data[] = $randomNum;
            $data[] = $rigthAnswer;
            $currentRound += 1;
    }
    $send = gameFlow($hello, $data);
}

function checkPrimeNum(int $num): string
{
        $bCheck = true;
        $highestIntegralSquareRoot = floor(sqrt($num));
    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i == 0) {
             $bCheck = false;
             break;
        }
    }
    if ($bCheck) {
          return 'yes';
    } else {
           return 'no';
    }
}
