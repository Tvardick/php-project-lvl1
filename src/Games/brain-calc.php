<?php

namespace BrainGames\Project\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\helloUser;

function letsCalcIt()
{
    $name = helloUser();
    line("What is the result of the expression?");
    $currentRound = 1;
    $maxRound = 3;
    while ($currentRound <= $maxRound) {
            $getTask = randomOperation();
            $result = implode(" ", $getTask);
            //require langleyfoxall/math_eval
            $rigthAnswer = math_eval($result);
            line("Question: %s", $result);
            $answer = prompt("Your Answer");
        if ($answer != $rigthAnswer) {
            return line("%s is wrong answer ;(. Correct answer was %s.
                Let's try again, %s!", $answer, $rigthAnswer, $name);
        } else {
                    line("Correct!");
        }
            $currentRound += 1;
    }
    return line("Congratulations, %s!", $name);
}


function randomOperation()
{
    $result = [];
    $operands = ["+", "-", "*"];
    $randomOperandNumber = rand(0, 2);
    $randomFirstNumber = rand(1, 99);
    $randomSecondNumber = rand(1, 10);
    $result[] = $randomFirstNumber;
    $result[] = $operands[$randomOperandNumber];
    $result[] = $randomSecondNumber;
    return $result;
}
