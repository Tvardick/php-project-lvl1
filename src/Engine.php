<?php

namespace BrainGames\Project\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Project\Cli\whatIsYourName;

function gameFlow(string $terms, array $data, string $round = '3'): ?string
{
   // print_r($data);        
        $name = whatIsYourName();
        $hello = line("%s", $terms);
        for (
            $currentRound = 1, $rou = (int)$round,
            $accessTask = 0, $accessAnswer = 1;
            $currentRound <= $rou;
            $accessTask += 2, $accessAnswer += 2,
            $currentRound++
            ) {
        line("Question: %s", $data[$accessTask]);
        $answer = prompt("Your Answer");
        if ($answer != $data[$accessAnswer]) {
             return line("%s is wrong answer ;(. Correct answer was %s.
Let's try again, %s!", $answer, $data[$accessAnswer], $name);
        } else {
                line("Correct!");
        }
    }
         return line("Congratulations, %s!", $name);
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
