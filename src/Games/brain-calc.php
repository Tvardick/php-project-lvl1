<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\gameFlow;

function tryCalc()
{
    $data = [];
    $hello = "What is the data of the expression?";
    $currentRound = 1;
    $limitMaxRounds = 3;
    while ($currentRound <= $limitMaxRounds) {
            $getTask = generationTask();
            $rigthAnswer = math_eval($getTask);
            $data[] = $getTask;
            $data[] = $rigthAnswer;
            $currentRound += 1;
    }
    $sendData = gameFlow($hello, $data);
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
