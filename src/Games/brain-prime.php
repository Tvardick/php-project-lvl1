<?php

namespace BrainGames\Project\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\helloUser;

function isPrimeNumber()
{
    $name = helloUser();
    line("Answer \"yes\" if the number is prime, otherwise answer \"no\".");
    $currentRound = 1;
    $maxRound = 3;
    while ($currentRound <= $maxRound) {
            $randomNumber = rand(1, 100);
            $rigthAnswer = checkingPrimeNumber($randomNumber);
            line("Question: %s", $randomNumber);
            $answer = prompt("Your Answer");
        if ($answer != $rigthAnswer) {
                    return line("%s is wrong answer ;(. Correct answer was %s.
        Let's try again, %s", $answer, $rigthAnswer, $name);
        } else {
                    line("Correct!");
        }
            $currentRound += 1;
    }
    return line("Congratulations, %s!", $name);
}


function checkingPrimeNumber($num)
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
