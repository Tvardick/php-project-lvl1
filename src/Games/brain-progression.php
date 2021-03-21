<?php

namespace BrainGames\Project\Progression;

use function Funct\Collection\firstN;
use function BrainGames\Project\Engine\getResultGame;

const TASKED_QUESTION = "What number is missing in the progression?";

function startGame(): void
{
    $task = fn() => getTask();
    getResultGame(TASKED_QUESTION, $task);
}

function getTask(): array
{
    $numbers = [];
    $randomNum = rand(1, 99);
    $sizeRow = rand(5, 15);
    $progressiveNum = rand(1, 10);
    $numbers[] = $randomNum;
    $numbers[] = $sizeRow;
    $numbers[] = $progressiveNum;
    return createRowNumbers($numbers);
}

function createRowNumbers(array $numbers): array
{
    [$randomNum, $sizeRow, $progressiveNum] = $numbers;
    $completeRow = [];
    $counter = 0;
    while ($counter <= $sizeRow) {
        $completeRow[] = $randomNum;
        $randomNum += $progressiveNum;
        $counter += 1;
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
    $task[] = (string) $answer;
    return $task;
}
