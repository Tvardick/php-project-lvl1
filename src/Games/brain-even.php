<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\gameFlow;

function isTheEvenNumber(): ?string
{
    $helloUser = 'Answer "yes" if the number is even, otherwise answer "no".';
    $data = [];
    for ($i = 0, $end = 2; $i <= $end; $i++) {
        $data[] = $randomNumber = rand(1, 100);
        $data[] = $rigthAnswer = checkingEvenNumber($randomNumber);
    }
    $sendData = gameFlow($helloUser, $data);
    return $sendData;
}

function checkingEvenNumber(int $num): string
{
    if ($num % 2 === 0) {
        return "yes";
    } else {
        return "no";
    }
}
