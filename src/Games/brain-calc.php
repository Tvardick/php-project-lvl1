<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\gameFlow;
use function cli\prompt;

function letsCalcIt(): ?string
{
    $round = prompt("how many round you want");
    $data = [];
    $hello = "What is the data of the expression?";
    for ($i = 1; $i <= $round; $i++) {
            $getTask = randomOperation();
            $rigthAnswer = math_eval($getTask);
            $data[] = $getTask;
            $data[] = $rigthAnswer;
    }
    $sendData = gameFlow($hello, $data, $round);
    return $sendData;
}


function randomOperation(): string
{
    $data = [];
    $operands = ["+", "-", "*"];
    $randomOperandNumber = rand(0, 2);
    $randomFirstNumber = rand(1, 99);
    $randomSecondNumber = rand(1, 10);
    $data[] = $randomFirstNumber;
    $data[] = $operands[$randomOperandNumber];
    $data[] = $randomSecondNumber;
    $result = implode(" ", $data);
    return $result;
}
