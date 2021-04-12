<?php

namespace BrainGames\Project\Progression;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "What number is missing in the progression?";
const REPLACEMENT = "..";

function startGame(): void
{
    $getTask = fn() => getTask();
    runGame(TASK_DESCRIPTION, $getTask);
}

function initProgress(): array
{
    $sizeRow = rand(5, 15);
    $beginNumber = 1;
    $progressiveNum = rand(1, 10);
    return [$sizeRow, $progressiveNum, $beginNumber];
}

function creatingSeriesNumbers(int $sizeRow, int $progressiveNum, int $beginNumber): array
{
    $completeRow = [];
    for ($i = $beginNumber; $i <= $sizeRow; $i++) {
        $completeRow[] = $i * $progressiveNum;
    }
    return $completeRow;
}

function findReplacement(array $completeRow): int
{
    $count = count($completeRow) - 1;
    $replace = rand(1, $count);
    return $replace;
}

function replacementNumber(array $completeRow, int $replace): array
{
    $numericalProgression = $completeRow;
    $answer = $numericalProgression[$replace];
    $numericalProgression[$replace] = REPLACEMENT;
    return [$numericalProgression, $answer];
}

function getTask(): array
{
    [$sizeRow, $progressiveNum, $beginNumber] = initProgress();
    $progression = creatingSeriesNumbers($sizeRow, $progressiveNum, $beginNumber);
    $replace = findReplacement($progression);
    [$numericalProgression, $answer] = replacementNumber($progression, $replace);
    return [implode(" ", $numericalProgression), (string)$answer];
}
