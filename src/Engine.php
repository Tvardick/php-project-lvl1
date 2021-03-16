<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUND_LIMIT = 3;

function gameFlow(string $taskForWin, callable $task): ?string
{
    line("Welcome Brain Game!");
    $nameUser = prompt("May I have your name?");
    line("Hello, %s!", $nameUser);
    line("%s", $taskForWin);

    for ($currentRound = 1; $currentRound <= MAX_ROUND_LIMIT; $currentRound += 1) {
        [$question, $expectedAnswer] = call_user_func($task);
        line("Question: %s", $question);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer != $expectedAnswer) {
            return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $userAnswer, $expectedAnswer, $nameUser);
        } else {
            line("Correct!");
        }
    }
    return line("Congratulations, %s!", $nameUser);
}
