<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\gameFlow;

const HELLO = "What is the data of the expression?";

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(HELLO, $task);
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
    $completeTask = implode(" ", $mathExample);
    //Я знаю что eval нельзя использовать из за потенциальной опасности
    //но функция math_evel создана для решения как раз моей задачи
    //и она безопасна. Как написано в репозитории
    //https://github.com/langleyfoxall/math_eval
    //стоит доверять подобной информации? Или самому искать решение проблем?
    $taskSolution = math_eval($completeTask);
    $task['question'] = $completeTask;
    $task['expectedAnswer'] = $taskSolution;
    return $task;
}
