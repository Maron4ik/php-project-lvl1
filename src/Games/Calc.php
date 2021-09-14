<?php

namespace BrainGames\Games\Calc;

use BrainGames\Engine;
use BrainGames\Cli;

use function cli\line;
use function cli\prompt;


function numberCalc(): void
{
    $gameData = [
        prepareQuestion(),
        prepareQuestion(),
        prepareQuestion()
    ];
    $rules = 'What is the result of the expression?';
    Engine\newEngine($gameData, $rules);
}

function prepareQuestion(): array
{
    $characters = '+-*';
    $randCharacter = $characters[rand(0, strlen($characters) - 1)];
    $randNumber1 = rand(1, 10);
    $randNumber2 = rand(1, 10);

    if ($randCharacter === '+') {
        $correctAnswer = $randNumber1 + $randNumber2;
    } elseif ($randCharacter === '-') {
        $correctAnswer = $randNumber1 - $randNumber2;
    } else {
        $correctAnswer = $randNumber1 * $randNumber2;
    }

    $question = "{$randNumber1} {$randCharacter} {$randNumber2}";

    return ['question' => $question, 'correctAnswer' => (string) $correctAnswer];
}
