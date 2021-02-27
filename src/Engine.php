<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\whatIsYourName;

define('LIMITROUND', '2');

function gameFlow(string $hello, callable $task, string $nameSpace): ?string
{
        $name = whatIsYourName();
        $hello = line("%s", $hello);
        $limitMaxRounds = LIMITROUND;

    for ($currentRound = 0; $currentRound <= $limitMaxRounds; $currentRound += 1) {
        $callAbleTask = call_user_func($task);
        $expectedResponse = call_user_func($nameSpace, $callAbleTask);
        line("Question: %s", $callAbleTask);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer != $expectedResponse) {
             return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $userAnswer, $expectedResponse, $name);
        } else {
                line("Correct!");
        }
    }
         return line("Congratulations, %s!", $name);
}
