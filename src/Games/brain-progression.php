<?php

namespace BrainGames\Project\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\helloUser;

function generationTask(): array
{
        $numbers = [];
        $counter = 0;
        $randomNumber = rand(1, 99);
        $maxSizeTask = rand(5, 15);
        $randomProgressiveNumber = rand(1, 10);
    while ($counter <= $maxSizeTask) {
        $numbers[] = $randomNumber;
        $randomNumber += $randomProgressiveNumber;
        $counter += 1;
    }
        return $numbers;
}

function randomNumberReplacement(): ?string
{
        $name = helloUser();
        line("What number is missing in the progression?");
        $replacement = "..";
        $currentRound = 1;
        $maxRound = 3;
    while ($currentRound <= $maxRound) {
            $getTask = generationTask();
            $sizeTask = count($getTask) - 1;
            $randomNumber = rand(0, $sizeTask);
        $rigthAnswer = $getTask[$randomNumber];
        $getTask[$randomNumber] = $replacement;
        $convertToStr = implode(" ", $getTask);
        line("Question: %s", $convertToStr);
        $answer = prompt("Your Answer");
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
