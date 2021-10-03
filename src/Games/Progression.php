<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function runProgressionGame(): void
{
    $getRightAnswerForRound = function () {
        $randomFirstNumber = rand(0, 10);
        $randomStepProgression = rand(1, 5);
        $randomArrLength = rand(5, 10);
        $array = [];

        for ($j = 0; $j < $randomArrLength; $j++) {
            $randomFirstNumber += $randomStepProgression;
            $array[$j] = $randomFirstNumber;
        }
        $skippedKey = rand(0, count($array) - 1);
        $rightAnswer = $array[$skippedKey];
        $array[$skippedKey] = '..';
        $roundQuestion = implode(' ', $array);
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    runEngine($getRightAnswerForRound, 'What number is missing in the progression?');
}
