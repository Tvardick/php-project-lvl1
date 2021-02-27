<?php

namespace BrainGames\Project\Progression;

use function Funct\Collection\firstN;
use function BrainGames\Project\Engine\gameFlow;

function startGame(): void
{
    $hello = "What number is missing in the progression?";
    $task = fn() => getTask();
    $expectedAnswer = fn($task) => getAnswer($task);
    $start = gameFlow($hello, $task, $expectedAnswer);
}

function getAnswer(string $task): string
{
    $diff = 0;
    $result = [];
    $backToRows = explode(" ", $task);
    foreach ($backToRows as $item => $row) {
        if ($row === "..") {
            $diff = $item;
            break;
        }
    }
    $searchRigthAnswer = findAnswer($backToRows, $diff);
    return $searchRigthAnswer;
}

function findAnswer(array $rows, int $diff): string
{
    $result = [];
    foreach ($rows as $row) {
        $result[] = intval($row);
    }
    $firstTwoValues = firstN($result, 2);
    $diffValues = $firstTwoValues[1] - $firstTwoValues[0];
    $answer = $result[$diff - 1] + $diffValues;
    return $answer;
}

function getTask(): string
{
    $replacement = "..";
    $gettingTask = createRowNumbers();
    $countTask = count($gettingTask) - 1;
    $replace = rand(3, $countTask);
    $gettingTask[$replace] = $replacement;
    return implode(" ", $gettingTask);
}

function createRowNumbers(): array
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
