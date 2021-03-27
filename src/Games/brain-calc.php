<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "What is the data of the expression?";

function startGame(): void
{
    $initTask = fn() => initTask();
    runGame(TASK_DESCRIPTION, $initTask);
}

function initTask(): array
{
    $operands = ["+", "-", "*"];
    $randomOperand = rand(0, 2);
    $firstNum = rand(1, 99);
    $secondNum = rand(1, 10);
    return getTask($firstNum, $operands[$randomOperand], $secondNum);
}

function getTask(int $firstNum, string $operand, int $secondNum): array
{
    $task = [];
    $completeTask = "{$firstNum} {$operand} {$secondNum}";
    $task[] = $completeTask;
    $task[] = getAnswer($firstNum, $operand, $secondNum);

    return $task;
}

function getAnswer(int $firstNum, string $operand, int $secondNum): int
{
    $taskSolution = 0;
    switch ($operand) {
        case "-":
            $taskSolution = $firstNum - $secondNum;
            break;
        case "+":
            $taskSolution = $firstNum + $secondNum;
            break;
        case "*":
            $taskSolution = $firstNum * $secondNum;
            break;
    }
    return $taskSolution;
}
