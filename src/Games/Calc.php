<?php

namespace BrainGames\Games;

use Exception;

use function BrainGames\roundData;

/**
 * @throws Exception
 */
function generateComputedExpression(int $firstNumber, int $secondNumber, string $operation): int
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
            throw new Exception("Is there something wrong");
    }

    return $result;
}

function runCalculationGame(): void
{
    /**
     * @throws Exception
     */
    $getRightAnswer = function (): array {
        $randomTopNumber = 10;
        $firstNumber = random_int(0, $randomTopNumber);
        $secondNumber = random_int(0, $randomTopNumber);
        $operations = ['+', '-', '*'];
        $randKey = array_rand($operations);
        $operation = $operations[$randKey];
        $rightAnswer = generateComputedExpression($firstNumber, $secondNumber, $operation);

        $roundQuestion = "{$firstNumber} {$operation} {$secondNumber}";

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => (string)$rightAnswer];
    };

    roundData($getRightAnswer, 'What is the result of the expression?');
}
