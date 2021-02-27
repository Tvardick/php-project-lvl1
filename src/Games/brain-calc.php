<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\gameFlow;

function startGame(): void
{
    $hello = "What is the data of the expression?";
    $nameSpace = "BrainGames\Project\Calc\getAnswer";
    $task = fn() => generationTask();
    $start = gameFlow($hello, $task, $nameSpace);
}

function generationTask(): string
{
    $data = [];
    $operands = ["+", "-", "*"];
    $randomOperand = rand(0, 2);
    $firstNum = rand(1, 99);
    $secondNum = rand(1, 10);
    $data[] = $firstNum;
    $data[] = $operands[$randomOperand];
    $data[] = $secondNum;
    return implode(" ", $data);
}

function getAnswer(string $mathExample): int
{
    return math_eval($mathExample);
}
