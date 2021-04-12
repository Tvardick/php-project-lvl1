<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $taskDescription, callable $getTask): void
{
    line("Welcome Brain Game!");
    $nameUser = prompt("May I have your name?");
    line("Hello, %s!", $nameUser);
    line("%s", $taskDescription);

    for ($currentRound = 0; $currentRound < ROUNDS_COUNT; $currentRound += 1) {
        [$question, $expectedAnswer] = call_user_func($getTask);
        line("Question: %s", $question);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer === $expectedAnswer) {
            line("Correct!");
        } else {
            line(
                "%s is wrong answer ;(. Correct answer was %s. Let's try again, %s!",
                $userAnswer,
                $expectedAnswer,
                $nameUser
            );
            return;
        }
    }
    line("Congratulations, %s!", $nameUser);
}
