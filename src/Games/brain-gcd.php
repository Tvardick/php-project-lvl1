<?php

namespace BrainGames\Project\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\helloUser;

function letsGreatCommonDivider()
{
    $currentRound = 1;
    $maxLimitRound = 3;
    $name = helloUser();
    line("Find the greatest common divisor of given numbers.");
    while ($currentRound <= $maxLimitRound) {
            $randomFirstNumber = rand(1, 100);
            $randomSecondNumber = rand(1, 100);
            $result = isTheGreatCommonDivider($randomFirstNumber, $randomSecondNumber);
            line("Question: %s %s", $randomFirstNumber, $randomSecondNumber);
            $answer = prompt("Your Answer");
        if ($answer != $result) {
                            return line("%s is wrong answer ;(. Correct answer was %s.
                Let's try again, %s!", $answer, $result, $name);
        } else {
                            line("Correct!");
        }
                    $currentRound += 1;
    }
    return line("Congratulations, %s!", $name);
}


function isTheGreatCommonDivider(int $randomNumberOne, int $randomNumberTwo): int
{
    while ($randomNumberOne != 0 && $randomNumberTwo != 0) {
        if ($randomNumberOne > $randomNumberTwo) {
                        $randomNumberOne = $randomNumberOne % $randomNumberTwo;
        } else {
                        $randomNumberTwo = $randomNumberTwo % $randomNumberOne;
        }
    }
        return $randomNumberOne + $randomNumberTwo;
}
