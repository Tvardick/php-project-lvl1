<?php

namespace BrainGames\Project\Progression;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "What number is missing in the progression?";
const REPLACEMENT = "..";
const BEGIN_NUMBER = 1;

function startGame(): void
{
    $initTask = fn() => initTask();
    runGame(TASK_DESCRIPTION, $initTask);
}

function initTask(): array
{
    $sizeRow = rand(5, 15);
    $progressiveNum = rand(1, 10);
    return createRowNumbers($sizeRow, $progressiveNum);
}

function createRowNumbers(int $sizeRow, int $progressiveNum): array
{
    $completeRow = [];
    for ($i = BEGIN_NUMBER; $i <= $sizeRow; $i++) {
        $completeRow[] = $i * $progressiveNum;
    }
    return getReplace($completeRow);
}

function getReplace(array $completeRow): array
{
    $count = count($completeRow) - 1;
    $replace = rand(1, $count);
    return creatingTask($completeRow, $replace);
}

function creatingTask(array $completeRow, int $replace): array
{
    $numericalProgression = $completeRow;
    $answer = $numericalProgression[$replace];
    $numericalProgression[$replace] = REPLACEMENT;
    return getTask($numericalProgression, $answer);
}

function getTask(array $numericalProgression, int $answer): array
{
    return [0 => implode(" ", $numericalProgression), 1 => (string)$answer];
}
