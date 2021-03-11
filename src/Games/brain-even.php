<?php

namespace BrainGames\Project\Even;

use function BrainGames\Project\Engine\gameFlow;

const HELLO = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame(): void
{
    $task = fn() => getTask();
    gameFlow(HELLO, $task);
}

function getAnswer(int $num): bool
{
    return $num % 2 === 0;
}

function getTask(): array
{
    $task = [];
    $task['question'] = rand(1, 100);
    //здесь надо создавать переменную для вызова функции
    //что бы потом через тернарный оператор выяснить ответ?
    $task['expectedAnswer'] = getAnswer($task['question']) ? 'yes' : 'no';
    return $task;
}
