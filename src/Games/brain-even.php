<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\gameFlow;

function getEvenNumber(): void
{
    $hello = 'Answer "yes" if the number is even, otherwise answer "no".';
    $data = [];
    $currentRound = 1;
    $limitMaxRounds = LIMITROUND;
    while ($currentRound <= $limitMaxRounds) {
        $data[] = $randomNumber = rand(1, 100);
        $data[] = $rigthAnswer = checkEvenNumber($randomNumber);
        $currentRound += 1;
    }
    $sendData = gameFlow($hello, $data);
}
// Тут я не придумал как можно переделать функцию в предикант.
// Ведь игра ожидает ответа yes или no.
function checkEvenNumber(int $num): string
{
    if ($num % 2 === 0) {
        return "yes";
    } else {
        return "no";
    }
}
