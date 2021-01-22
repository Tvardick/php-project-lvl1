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
        if ($randomNumber % 2 === 0 && $answer != "yes") {
                return line("'%s' is wrong answer ;(. Correct answer was 'yes'.
Let's try again, %s!", $answer, $name);
        } elseif ($randomNumber % 2 != 0 && $answer != "no") {
                return line("'%s' is wrong answer ;(. Correct answer was 'no'.
Let's try again, %s!", $answer, $name);
        } else {
                line("Correct!");
        }
        $currentRound += 1;
    }
        return line("Congratulations, %s!", $name);
}
