<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;

const FINAL_ROUND = 3;

function getResultGame(string $taskedQuestion, callable $task): void
{
    line("Welcome Brain Game!");
    $nameUser = prompt("May I have your name?");
    line("Hello, %s!", $nameUser);
    line("%s", $taskedQuestion);

    for ($currentRound = 0; $currentRound < FINAL_ROUND; $currentRound += 1) {
        [$question, $expectedAnswer] = call_user_func($task);
        line("Question: %s", $question);
        $userAnswer = prompt("Your Answer");
        if ($userAnswer !== $expectedAnswer) {
            die(line(
                "%s is wrong answer ;(. Correct answer was %s. Let's try again, %s!",
                $userAnswer,
                $expectedAnswer,
                $nameUser
            ));
        } else {
            line("Correct!");
        }
    }
    die(line("Congratulations, %s!", $nameUser));
}
