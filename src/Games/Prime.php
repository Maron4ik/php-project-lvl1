<?php

namespace BrainGames\Games\Prime;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function prime(): void
{
    $gameData = [
        prepareQuestion(),
        prepareQuestion(),
        prepareQuestion()
    ];
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    Engine\newEngine($gameData, $rules);
}

function prepareQuestion(): array
{
    $randomNumber = rand(1, 100);
    $dividerCounter = 1;
    for ($i = 1; $i < $randomNumber; $i++) {
        if ($randomNumber % $i == 0) {
            $dividerCounter++;
        }
    }
    if ($dividerCounter > 2) {
        $correctAnswer = 'no';
    } else {
        $correctAnswer = 'yes';
    }

    $question = $randomNumber;

    return ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
}
