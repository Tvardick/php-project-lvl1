<?php

namespace BrainGames\Project\Progression;

use function Funct\Collection\firstN;
use function BrainGames\Project\Engine\gameFlow;

const HELLO = "What number is missing in the progression?";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(HELLO, $task);
}

function getTask(): array
{
    $task = [];
    $replacement = "..";
    $rowNumber = createRowNumbers();
    $countRow = count($rowNumber) - 1;
    $replace = rand(1, $countRow);
    $answer = $rowNumber[$replace];
    $rowNumber[$replace] = $replacement;
    $task["question"] = implode(" ", $rowNumber);
    $task["expectedAnswer"] = $answer;
    return $task;
}

function createRowNumbers(): array
{
        $numbers = [];
        $counter = 0;
        $randomNum = rand(1, 99);
        $sizeRow = rand(5, 15);
        $progressiveNum = rand(1, 10);
    while ($counter <= $sizeRow) {
        $numbers[] = $randomNum;
        $randomNum += $progressiveNum;
        $counter += 1;
    }
        return $numbers;
}
