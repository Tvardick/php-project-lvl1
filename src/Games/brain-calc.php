<?php

namespace BrainGames\Project\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\helloUser;

function letsCalcIt()
{
    $name = helloUser();
    $currentRound = 1;
    $maxRound = 3;
    while ($currentRound <= $maxRound) {
            $randomFirstNumber = rand(1, 99);
            $randomSecondNumber = rand(1, 10);
            $randomOperand = randomOperand();
            $result = "{$randomFirstNumber}{$randomOperand}{$randomSecondNumber}";
            $rigthAnswer = math_eval($result);
            line("What is the result of the expression?");
            line("Question: %s", $result);
            $answer = prompt("Your Answer");
        if ($answer != $rigthAnswer) {
                    return line("%s is wrong answer ;(. Correct answer was %s.
        Let's try again, %s", $answer, $rigthAnswer, $name);
        } else {
                    line("Correct!");
        }
            $currentRound += 1;
    }
    return line("Congratulations, %s!", $name);
}


function randomOperand()
{
    $operands = ["+", "-", "*"];
    $randomNumber = rand(0, 2);
    return $operands[$randomNumber];
}
