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
    $randomNumber = rand(0, 100);
    $dividerCounter = 0;
    for ($j = 1; $j < $randomNumber; $j++) {
        if ($randomNumber % $j == 0) {
            $dividerCounter++;
        }
    }
    if ($dividerCounter > 2) {
        $correctAnswer = 'no';
    } else {
        $correctAnswer = 'yes';
    }

    $question = $randomNumber;

    return ['question' => $question, 'correctAnswer' => (string) $correctAnswer];
}
