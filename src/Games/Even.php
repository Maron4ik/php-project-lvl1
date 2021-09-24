<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function numberEven(): void
{
    $gameData = [
        prepareQuestion(),
        prepareQuestion(),
        prepareQuestion()
    ];
    $rules = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    Engine\newEngine($gameData, $rules);
}

function prepareQuestion(): array
{
    $randomNumber = rand(2, 20);
    $correctAnswer = '';
    if ($randomNumber % 2 == 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }

    $question = $randomNumber;

    return ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
}
