<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\getResultGame;

const TASKED_QUESTION = "What is the data of the expression?";

function startGame(): void
{
    $task = fn() => getTask();
    getResultGame(TASKED_QUESTION, $task);
}

function creatTask(): array
{
    $data = [];
    $operands = ["+", "-", "*"];
    $randomOperand = rand(0, 2);
    $firstNum = rand(1, 99);
    $secondNum = rand(1, 10);
    $data[] = $firstNum;
    $data[] = $operands[$randomOperand];
    $data[] = $secondNum;
    return $data;
}

function getTask(): array
{
    $task = [];
    $mathTask = creatTask();
    $taskSolution = getAnswer($mathTask);
    $completeTask = implode(" ", $mathTask);
    $task[] = $completeTask;
    $task[] = $taskSolution;
    return $task;
}

function getAnswer(array $mathTask): string
{
    switch ($mathTask[1]) {
        case "-":
            $taskSolution = $mathTask[0] - $mathTask[2];
            break;
        case "+":
            $taskSolution = $mathTask[0] + $mathTask[2];
            break;
        default:
            $taskSolution = $mathTask[0] * $mathTask[2];
    }
    return (string) $taskSolution;
}
