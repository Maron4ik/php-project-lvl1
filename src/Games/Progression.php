<?php

namespace BrainGames\Games;

use Exception;

use function BrainGames\roundData;

function generateProgression(int $randomFirstNumber, int $randomStepProgression, int $randomArrLength): array
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
        $randFirstNum = random_int(0, 10);
        $randStepProgression = random_int(1, 5);
        $randArrLength = random_int(5, 10);
        $progression = generateProgression($randFirstNum, $randStepProgression, $randArrLength);
        $skippedKey = random_int(0, count($progression) - 1);
        $rightAnswer = $progression[$skippedKey];
        $progression[$skippedKey] = '..';
        $roundQuestion = implode(' ', $progression);
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => (string)$rightAnswer];
    };
    $question = 'What number is missing in the progression?';
    roundData($getRightAnswerForRound, $question);
}
