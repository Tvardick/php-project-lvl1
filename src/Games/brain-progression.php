<?php

namespace BrainGames\Project\Progression;

use function BrainGames\Project\Engine\gameFlow;

function getProgress(): void
{
        $hello = "What number is missing in the progression?";
        $replacement = "..";
        $currentRound = 1;
        $limitMaxRounds = LIMITROUND;
        $data = [];
    while ($currentRound <= $limitMaxRounds) {
            $gettingTask = generationTask();
            $countTask = count($gettingTask) - 1;
            $replace = rand(1, $countTask);
            $rigthAnswer = $gettingTask[$replace];
            $gettingTask[$replace] = $replacement;
            $convertToStr = implode(" ", $gettingTask);
            $data[] = $convertToStr;
            $data[] = $rigthAnswer;
            $currentRound += 1;
    }
        $send = gameFlow($hello, $data);
}

function generationTask(): array
{
        $numbers = [];
        $counter = 0;
        $randomNum = rand(1, 99);
        $sizeMaxTask = rand(5, 15);
        $randomProgressiveNum = rand(1, 10);
    while ($counter <= $sizeMaxTask) {
        $numbers[] = $randomNum;
        $randomNum += $randomProgressiveNum;
        $counter += 1;
    }
        return $numbers;
}
