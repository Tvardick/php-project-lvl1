<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\whatIsYourName;

define('LIMITROUND', '3');

function gameFlow(string $hello, array $data): ?string
{
        $name = whatIsYourName();
        $hello = line("%s", $hello);
        $limitMaxRounds = LIMITROUND;
        $task = 0;
        $rigthAnswer = 1;

    for (
            $currentRound = 1;
            $currentRound <= $limitMaxRounds;
            $task += 2, $rigthAnswer += 2,
            $currentRound += 1
    ) {
        line("Question: %s", $data[$task]);
        $answer = prompt("Your Answer");
        if ($answer != $data[$rigthAnswer]) {
             return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $answer, $data[$rigthAnswer], $name);
        } else {
                line("Correct!");
        }
    }
         return line("Congratulations, %s!", $name);
}
