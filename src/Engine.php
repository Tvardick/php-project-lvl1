<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_ROUNDS = 3;

function runGame(string $taskDescription, callable $getTask): void
{
    line("Welcome Brain Game!");
    $nameUser = prompt("May I have your name?");
    line("Hello, %s!", $nameUser);
    line("%s", $taskDescription);

    for ($currentRound = 0; $currentRound < NUMBER_ROUNDS; $currentRound += 1) {
        [$question, $expectedAnswer] = call_user_func($getTask);
        line("Question: %s", $question);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer !== $expectedAnswer) {
            line(
                "%s is wrong answer ;(. Correct answer was %s. Let's try again, %s!",
                $userAnswer,
                $expectedAnswer,
                $nameUser
            );
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $nameUser);
    return;
}
