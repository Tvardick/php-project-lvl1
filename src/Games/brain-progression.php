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
    $stepProgress = rand(1, 10);
    return [$size, $stepProgress, $beginNumber];
}

function createProgression(int $size, int $stepProgress, int $beginNumber): array
{
    $progression = [];
    for ($i = $beginNumber; $i <= $size; $i++) {
        $progression[] = $i * $stepProgress;
    }
    return $progression;
}

function getReplacementIndex(array $progression): int
{
    $replacementIndex = array_rand($progression);
    return $replacementIndex;
}

function getAnswer(array $progression, int $replacementIndex): int
{
    $answer = $progression[$replacementIndex];
    return $answer;
}

function replaceNumber(array $progression, int $replacementIndex): array
{
    $progression[$replacementIndex] = REPLACEMENT;
    return $progression;
}

function getTask(): array
{
    [$size, $stepProgress, $beginNumber] = initProgress();
    $progression = createProgression($size, $stepProgress, $beginNumber);
    $replacementIndex = getReplacementIndex($progression);
    $answer = getAnswer($progression, $replacementIndex);
    $replacedProgression = replaceNumber($progression, $replacementIndex);
    return [implode(" ", $replacedProgression), (string)$answer];
}
