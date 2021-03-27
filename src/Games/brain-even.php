<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame(): void
{
    $getTask = fn() => getTask();
    runGame(TASK_DESCRIPTION, $getTask);
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
