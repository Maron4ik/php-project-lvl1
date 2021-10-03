<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function getGCD(int $firstNumber, int $secondNumber): float|int
{
    if ($secondNumber > 0) {
        return getGCD($secondNumber, $firstNumber % $secondNumber);
    } else {
        return abs($firstNumber);
    }
}

function runGcdGame(): void
{
    $getRightAnswerForRound = function () {
        $randomTopNumber = 100;
        $firstNumber = rand(0, $randomTopNumber);
        $secondNumber = rand(0, $randomTopNumber);
        $rightAnswer = getGCD($firstNumber, $secondNumber);
        $roundQuestion = "{$firstNumber} {$secondNumber}";

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };

    runEngine($getRightAnswerForRound, 'Find the greatest common divisor of given numbers.');
}
