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
    $size = rand(5, 15);
    $beginNumber = 1;
    $progressiveNum = rand(1, 10);
    return [$size, $progressiveNum, $beginNumber];
}

function createProgression(int $size, int $progressiveNum, int $beginNumber): array
{
    $progression = [];
    for ($i = $beginNumber; $i <= $size; $i++) {
        $progression[] = $i * $progressiveNum;
    }
    return $progression;
}

function findReplace(array $progression): int
{
    $count = count($progression) - 1;
    $replace = rand(1, $count);
    return $replace;
}

function getAnswer(array $progression, int $replace): int
{
    $answer = $progression[$replace];
    return $answer;
}

function replaceNumber(array $progression, int $replace): array
{
    $progression[$replace] = REPLACEMENT;
    return $progression;
}

function getTask(): array
{
    [$size, $progressiveNum, $beginNumber] = initProgress();
    $progression = createProgression($size, $progressiveNum, $beginNumber);
    $replace = findReplace($progression);
    $answer = getAnswer($progression, $replace);
    $replaceProgression = replaceNumber($progression, $replace);
    return [implode(" ", $replaceProgression), (string)$answer];
}
