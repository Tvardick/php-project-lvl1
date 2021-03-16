<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\gameFlow;

const TASK_FOR_WIN = "What is the data of the expression?";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(TASK_FOR_WIN, $task);
}

function genMathExample(): array
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
    $mathExample = genMathExample();
    $taskSolution = getAnswer($mathExample);
    $completeTask = implode(" ", $mathExample);
    $task[] = $completeTask;
    $task[] = $taskSolution;
    return $task;
}

function getAnswer(array $mathExample): int
{
    if ($mathExample[1] === "-") {
        $taskSolution = $mathExample[0] - $mathExample[2];
    } elseif ($mathExample[1] === "+") {
        $taskSolution = $mathExample[0] + $mathExample[2];
    } else {
        $taskSolution = $mathExample[0] * $mathExample[2];
    }
    return $taskSolution;
}
