<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;

function game_Flow($quest, $task, $answer, $wrongAnswer, $difference)
{
        $name = helloUser();
        line("%s", $task);
    while ($currentRound <= $maxLimitRound) {
            $randomFirstNumber = rand(1, 100);
            $randomSecondNumber = rand(1, 100);
            $result = isTheGreatCommonDivider($randomFirstNumber, $randomSecondNumber);
            line("Question : %s", $task);
            $userAnswer = prompt("Your Answer");
                    $currentRound += 1;
    }
    return line("Congratulations, %s!", $name);
}

function checkingResult($answer, $rigthAnswer, $name)
{
    if ($answer != $rigthAnswer) {
        return line("%s is wrong answer ;(. Correct answer was %s.
                Let's try again, %s", $answer, $rigthAnswer, $name);
    } else {
        return line("Correct!");
    }
}
        /*
Welcome to the Brain Games!
May I have your name? Sam
Hello, Sam!
Find the greatest common divisor of given numbers.
Question: 25 50
Your answer: 25
Correct!
Question: 100 52
Your answer: 4
Correct!
Question: 3 9
Your answer: 3
Correct!
Congratulations, Sam!
В случае, если пользователь даст неверный ответ, необходимо вывести:

Question: 25 50
Your answer: 1
'1' is wrong answer ;(. Correct answer was '25'.
Let's try again, Sam!

         */
