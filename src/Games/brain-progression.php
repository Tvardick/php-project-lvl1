<?php

namespace BrainGames\Project\Progression;

use function Funct\Collection\firstN;
use function BrainGames\Project\Engine\gameFlow;

const TASK_FOR_WIN = "What number is missing in the progression?";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(TASK_FOR_WIN, $task);
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
    $task[] = implode(" ", $rowNumber);
    $task[] = $answer;
    return $task;
}

function createRowNumbers(): array
{
    $numbers = [];
    [$randomNum, $sizeRow, $progressiveNum] = generateFirstPool();
    $counter = 0;
    while ($counter <= $sizeRow) {
        $numbers[] = $randomNum;
        $randomNum += $progressiveNum;
        $counter += 1;
    }
    return $numbers;
}

function generateFirstPool(): array
{
    $numbers = [];
    $randomNum = rand(1, 99);
    $sizeRow = rand(5, 15);
    $progressiveNum = rand(1, 10);
    $numbers[] = $randomNum;
    $numbers[] = $sizeRow;
    $numbers[] = $progressiveNum;
    return $numbers;
}
