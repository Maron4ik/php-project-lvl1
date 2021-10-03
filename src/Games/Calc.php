<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function generateComputedExpression(int $firstNumber, int $secondNumber, string $operation): ?int
{
    switch ($operation) {
        case '+':
            $result = $firstNumber + $secondNumber;
            break;
        case '-':
            $result = $firstNumber - $secondNumber;
            break;
        case '*':
            $result = $firstNumber * $secondNumber;
            break;
        default:
            return null;
            break;
    }

    return $result;
}

function runCalculationGame(): void
{
    $getRightAnswerForRound = function (): array {
        $randomTopNumber = 10;
        $firstNumber = rand(0, $randomTopNumber);
        $secondNumber = rand(0, $randomTopNumber);
        $operations = ['+', '-', '*'];
        $randKey = array_rand($operations);
        $operation = $operations[$randKey];
        $rightAnswer = generateComputedExpression($firstNumber, $secondNumber, $operation);

        $roundQuestion = "{$firstNumber} {$operation} {$secondNumber}";

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };

    runEngine($getRightAnswerForRound, 'What is the result of the expression?');
}
