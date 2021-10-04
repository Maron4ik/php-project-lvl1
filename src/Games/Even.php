<?php

namespace BrainGames\Games;

use Exception;

use function BrainGames\roundData;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function runEvenGame(): void
{
    /**
     * @throws Exception
     */
    $getRightAnswerForRound = function (): array {
        $randomTopNumber = 100;
        $number = random_int(0, $randomTopNumber);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        $roundQuestion = $number;

        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };

    roundData($getRightAnswerForRound, 'Answer "yes" if the number is even, otherwise answer "no".');
}
