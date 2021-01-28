<?php

namespace BrainGames\Project\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\helloUser;

function isTheEvenNumber()
{
        $currentRound = 1;
        $maxLimitRound = 3;
        $name = helloUser();
        line('Answer "yes" if the number is even, otherwise answer "no".');
    while ($currentRound <= $maxLimitRound) {
        $randomNumber = rand(1, 99);
        line("Quetion: %s", $randomNumber);
        $answer = prompt("Your Answer");
        $rigthAnswer = checkingEvenNumber($randomNumber);
        if ($answer != $rigthAnswer) {
             return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $answer, $rigthAnswer, $name);
        } else {
                line("Correct!");
        }
        $currentRound += 1;
    }
        return line("Congratulations, %s!", $name);
}

function checkingEvenNumber($num)
{
    if ($num % 2 === 0) {
        return "yes";
    } else {
        return "no";
    }
}
