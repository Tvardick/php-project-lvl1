<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\whatIsYourName;

function gameFlow(string $terms, array $data): ?string
{
        $name = whatIsYourName();
        $hello = line("%s", $terms);
    for (
            $currentRound = 1, $finalRound = 3,
            $accessTask = 0, $accessAnswer = 1;
            $currentRound <= $finalRound;
            $accessTask += 2, $accessAnswer += 2,
            $currentRound += 1
    ) {
        line("Question: %s", $data[$accessTask]);
        $answer = prompt("Your Answer");
        if ($answer != $data[$accessAnswer]) {
             return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $answer, $data[$accessAnswer], $name);
        } else {
                line("Correct!");
        }
    }
         return line("Congratulations, %s!", $name);
}
