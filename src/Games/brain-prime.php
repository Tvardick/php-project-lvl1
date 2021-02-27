<?php

namespace BrainGames\Project\Prime;

use function BrainGames\Project\Engine\gameFlow;

function startGame(): void
{
    $hello = "Answer \"yes\" if the number is prime, otherwise answer \"no\".";
    $task = fn() => rand(1, 100);
    $expectedAnswer = fn($task) => getAnswer($task);
    $start = gameFlow($hello, $task, $expectedAnswer);
}

function checkTask(int $num): bool
{
    if ($num < 2) {
        return false;
    }
        $highestIntegralSquareRoot = floor(sqrt($num));
    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i === 0) {
             return false;
        }
    }
    return true;
}

function getAnswer(int $random): string
{
    $result = checkTask($random);
    return $result ? "yes" : "no";
}
