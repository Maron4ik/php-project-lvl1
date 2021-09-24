<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function gcd(): void
{
    $gameData = [
        prepareQuestion(),
        prepareQuestion(),
        prepareQuestion()
    ];
    $rules = 'Find the greatest common divisor of given numbers.';
    Engine\newEngine($gameData, $rules);
}

function prepareQuestion(): array
{
    $randNumber1 = rand(1, 10);
    $randNumber2 = rand(1, 10);
    $correctAnswer = GetGreatestDivisor($randNumber1, $randNumber2);
    $question = "{$randNumber1} {$randNumber2}";

    return ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
}

function GetGreatestDivisor(int $num1, int $num2): int
{
    $min = min($num1, $num2);

    while ($min > 1) {
        if ($num1 % $min == 0 && $num2 % $min == 0) {
            return $min;
        } else {
            $min--;
        }
    }
    return 1;
}
//gcd
