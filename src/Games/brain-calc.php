<?php

namespace BrainGames\Project\Calc;

use function BrainGames\Project\Engine\runGame;

const TASK_DESCRIPTION = "What is the data of the expression?";
const OPERATIONS = ["+", "-", "*"];
//const OPERATION_COUNT = 2;

function startGame(): void
{
    $initTask = fn() => initTask();
    runGame(TASK_DESCRIPTION, $initTask);
}

function initTask(): array
{
    //Тут я так понял надо м.ч. "2" вынести в константу,
    //а потом засомневался и просто вычеслил количество операций
    //как правильно?
    //Использование данных из внешней по отношению к функции области видимости
    //(константа в данном случае) делает ее также более архитектурно хрупкой и привязанной к контексту.
    //По возможности лучше передавать параметрами
    //
    //а потом ты сделал замечание по поводу внешних данных, и теперь оба варианта не подходят..или
    //я как то не правильно понимаю, ведь в движке тоже используеться внешние данные из константы.
    $randomOperation = rand(0, count(OPERATIONS) - 1);
    $firstNum = rand(1, 99);
    $secondNum = rand(1, 10);
    return getTask(OPERATIONS[$randomOperation], $firstNum, $secondNum);
}

function getTask(string $operation, int $firstNum, int $secondNum): array
{
    $task = [];
    $task[] = "{$firstNum} {$operation} {$secondNum}";
    $task[] = (string)getOperationResult($operation, $firstNum, $secondNum);

    return $task;
}

function getOperationResult(string $operation, int $firstNum, int $secondNum): int
{
    $taskSolution = 0;
    switch ($operation) {
        case "-":
            $taskSolution = $firstNum - $secondNum;
            break;
        case "+":
            $taskSolution = $firstNum + $secondNum;
            break;
        case "*":
            $taskSolution = $firstNum * $secondNum;
            break;
        default:
            throw new \Exception("Unknown operation: {$operation}");
    }
    return $taskSolution;
}
