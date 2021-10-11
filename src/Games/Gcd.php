<?php

namespace BrainGames\Games;

use Exception;

use function BrainGames\roundData;

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
    /**
     * @throws Exception
     */
    $getRightAnswerForRound = function (): array {
        $randomTopNumber = 100;
        $firstNumber = random_int(0, $randomTopNumber);
        $secondNumber = random_int(0, $randomTopNumber);
        $rightAnswer = getGCD($firstNumber, $secondNumber);
        $roundQuestion = "{$firstNumber} {$secondNumber}";

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => (string)$rightAnswer];
    };
    $question = 'Find the greatest common divisor of given numbers.';
    roundData($getRightAnswerForRound, $question);
}
