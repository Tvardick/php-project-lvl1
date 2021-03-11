<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\askName;

const LIMITROUND = 2;

function gameFlow(string $hello, callable $task): ?string
{
    $name = askName();
    $hello = line("%s", $hello);
    $limitMaxRounds = LIMITROUND;

    for ($currentRound = 0; $currentRound <= $limitMaxRounds; $currentRound += 1) {
        $callAbleTask = call_user_func($task);
        line("Question: %s", $callAbleTask['question']);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer != $callAbleTask['expectedAnswer']) {
             return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $userAnswer, $callAbleTask['expectedAnswer'], $name);
        } else {
                line("Correct!");
        }
    }
         return line("Congratulations, %s!", $name);
}
