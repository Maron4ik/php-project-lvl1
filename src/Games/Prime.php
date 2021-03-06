<?php

namespace BrainGames\Games;

use Exception;

use function BrainGames\roundData;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    if ($number === 2) {
        return true;
    }
    if ($number % 2 === 0) {
        return false;
    }
    $i = 3;
    $maxCount = (int)sqrt($number);
    while ($i <= $maxCount) {
        if ($number % $i === 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}

function runPrimeGame(): void
{
    /**
     * @throws Exception
     */
    $getRightAnswerForRound = function (): array {
        $randomTopNumber = 100;
        $number = random_int(0, $randomTopNumber);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        $roundQuestion = $number;

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    roundData($getRightAnswerForRound, $question);
}
