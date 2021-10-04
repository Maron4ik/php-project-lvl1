<?php

namespace BrainGames\Games;

use Exception;

use function BrainGames\roundData;

function generateProgression(int $randomFirstNumber,int $randomStepProgression, int $randomArrLength): array
{
    $array = [];

    for ($j = 0; $j < $randomArrLength; $j++) {
        $randomFirstNumber += $randomStepProgression;
        $array[$j] = $randomFirstNumber;
    }
    return $array;
}


function runProgressionGame(): void
{
    /**
     * @throws Exception
     */
    $getRightAnswerForRound = function (): array {
        $randomFirstNumber = random_int(0, 10);
        $randomStepProgression = random_int(1, 5);
        $randomArrLength = random_int(5, 10);
        $array = generateProgression($randomFirstNumber, $randomStepProgression, $randomArrLength);
        $skippedKey = random_int(0, count($array) - 1);
        $rightAnswer = $array[$skippedKey];
        $array[$skippedKey] = '..';
        $roundQuestion = implode(' ', $array);
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => (string)$rightAnswer];
    };

    roundData($getRightAnswerForRound, 'What number is missing in the progression?');
}
