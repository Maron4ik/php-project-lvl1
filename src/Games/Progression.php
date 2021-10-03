<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function generateProgression($firstNumber, $lastNumber, $numberStepProgression)
{
    $arithmeticProgression = [];
    for ($i = $firstNumber; $i < $lastNumber; $i += $numberStepProgression) {
        $arithmeticProgression[] = $i;
    }

    return $arithmeticProgression;
}

function runProgressionGame()
{
    $getRightAnswerForRound = function () {
        $randomLastNumber = 20;
        $randomFirstNumber = rand(0, 2);
        $randomStepProgression = rand(0, 3);
        $arithmeticProgression = generateProgression($randomFirstNumber, $randomLastNumber, $randomStepProgression);
        $skippedKey = array_rand($arithmeticProgression);
        $rightAnswer = $arithmeticProgression[$skippedKey];
        $arithmeticProgression[$skippedKey] = '..';
        $roundQuestion = implode(' ', $arithmeticProgression);

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };

    runEngine($getRightAnswerForRound, 'What number is missing in the progression?');
}
