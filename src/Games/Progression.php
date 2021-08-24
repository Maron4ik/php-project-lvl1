<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

// phpcs:disable
error_reporting(0);
// phpcs:enable

function progression()
{
    $name = Engine\greeting();
    $counter = 0;
    line('What number is missing in the progression?');

    for ($i = 0; $i < Engine\ROUNDCOUNT; $i++) {
        $randomFirstNumber = rand(0, 10);
        $randomStep = rand(1, 5);
        $randomArrLength = rand(5, 10);
        $randomIndex = rand(0, $randomArrLength);
        $array = [];

        #GET ARRAY
        for ($j = 0; $j < $randomArrLength; $j++) {
            $randomFirstNumber += $randomStep;
            $array[$j] = $randomFirstNumber;
        }

        $correctAnswer = $array[$randomIndex];
        $array[$randomIndex] = '..';
        $progression = implode(' ', $array);

        line('Question: %s', $progression);
        $answer = prompt("Your answer");
        if ($correctAnswer == $answer) {
            line('Correct!');
            $counter += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!" , $name);
            break;
        }
        if ($counter === Engine\ROUNDCOUNT) {
            line('Congratulations, %s!', $name);
        }
    }
}
