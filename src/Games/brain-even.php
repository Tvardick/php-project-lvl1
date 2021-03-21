<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\getResultGame;

const TASKED_QUESTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame(): void
{
    $task = fn() => getTask();
    getResultGame(TASKED_QUESTION, $task);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function getTask(): array
{
    $task = [];
    $task[] = rand(1, 100);
    $task[] = isEven($task[0]) ? 'yes' : 'no';
    return $task;
}
