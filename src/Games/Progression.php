<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function progression(): void
{
    $gameData = [
        prepareQuestion(),
        prepareQuestion(),
        prepareQuestion()
    ];
    $rules = 'What number is missing in the progression?';
    Engine\newEngine($gameData, $rules);
}

function prepareQuestion(): array
{
    $randomFirstNumber = rand(0, 10);
    $randomStep = rand(1, 5);
    $randomArrLength = rand(5, 10);
    $array = [];

    for ($j = 0; $j < $randomArrLength; $j++) {
        $randomFirstNumber += $randomStep;
        $array[$j] = $randomFirstNumber;
    }

    $randomIndex = rand(0, count($array) - 1);
    $correctAnswer = $array[$randomIndex];
    $array[$randomIndex] = '..';
    $progression = implode(' ', $array);

    $question = $progression;

    return ['question' => $question, 'correctAnswer' => (string) $correctAnswer];
}
