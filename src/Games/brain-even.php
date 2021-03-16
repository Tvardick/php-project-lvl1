<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\gameFlow;

const TASK_FOR_WIN = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(TASK_FOR_WIN, $task);
}

function getAnswer(int $num): bool
{
    return $num % 2 === 0;
}

function getTask(): array
{
    $task = [];
    $task[] = rand(1, 100);
    $task[] = getAnswer($task[0]) ? 'yes' : 'no';
    return $task;
}
