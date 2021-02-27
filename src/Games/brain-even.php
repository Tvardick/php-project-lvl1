<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\gameFlow;

function startGame(): void
{
    $hello = 'Answer "yes" if the number is even, otherwise answer "no".';
    $task = fn() => rand(1, 100);
    $expectedAnswer = fn($task) => getAnswer($task);
    $sendData = gameFlow($hello, $task, $expectedAnswer);
}

function checkTask(int $num): bool
{
    return $num % 2 === 0 ? true : false;
}

function getAnswer(int $num): string
{
    $result = checkTask($num);
    return $result === true ? 'yes' : 'no';
}
