<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "What is the data of the expression?";
const OPERATIONS = ["+", "-", "*"];

function startGame(): void
{
    $initTask = fn() => initTask();
    runGame(TASK_DESCRIPTION, $initTask);
}

function initTask(): array
{
    $randomOperation = rand(0, 2);
    $firstNum = rand(1, 99);
    $secondNum = rand(1, 10);
    return getTask(OPERATIONS[$randomOperation], $firstNum, $secondNum);
}

function getTask(string $operation, int $firstNum, int $secondNum): array
{
    $task = [];
    $prepareTask = "{$firstNum} {$operation} {$secondNum}";
    $task[] = $prepareTask;
    $task[] = (string)getResultOperation($operation, $firstNum, $secondNum);

    return $task;
}

function getResultOperation(string $operation, int $firstNum, int $secondNum): int
{
    $taskSolution = 0;
    switch ($operation) {
        case "-":
            $taskSolution = $firstNum - $secondNum;
            break;
        case "+":
            $taskSolution = $firstNum + $secondNum;
            break;
        case "*":
            $taskSolution = $firstNum * $secondNum;
            break;
        default:
            throw new Exception("Unknown operation: {$operation}");
    }
    return $taskSolution;
}
