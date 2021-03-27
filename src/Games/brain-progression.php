<?php

namespace BrainGames\Project\Progression;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "What number is missing in the progression?";

function startGame(): void
{
    $initTask = fn() => initTask();
    runGame(TASK_DESCRIPTION, $initTask);
}

function initTask(): array
{
    $sizeRow = rand(5, 15);
    $progressiveNum = rand(1, 10);
    $beginNumber = 1;
    return createRowNumbers($sizeRow, $progressiveNum, $beginNumber);
}

function createRowNumbers(int $sizeRow, int $progressiveNum, int $beginNumber): array
{
    $completeRow = [];
    for ($i = $beginNumber; $i <= $sizeRow; $i++) {
        $completeRow[] = $i * $progressiveNum;
    }
    return getReplace($completeRow);
}

function getReplace(array $completeRow): array
{
    $task = [];
    $replacement = "..";
    $countRow = count($completeRow) - 1;
    $replace = rand(1, $countRow);
    $answer = $completeRow[$replace];
    $completeRow[$replace] = $replacement;
    $task[] = implode(" ", $completeRow);
    $task[] = (string)$answer;
    return $task;
}
