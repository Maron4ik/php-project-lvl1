<?php

namespace BrainGames\Games\Prime;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

// phpcs:disable
error_reporting(0);
// phpcs:enable

function prime()
{
    $name = Engine\greeting();
    $counter = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < Engine\ROUNDCOUNT; $i++) {
        $randomNumber = rand(0, 100);
        $dividerCounter = 0;
        $correctAnswer = '';
        line('Question: %s', $randomNumber);
        $answer = prompt("Your answer");
        for ($j = 1; $j < $randomNumber; $j++) {
            if ($randomNumber % $j == 0) {
                $dividerCounter++;
            }
        }
        if ($dividerCounter > 2) {
            $correctAnswer = 'no';
        } else {
            $correctAnswer = 'yes';
        }

        if ($correctAnswer == $answer) {
            line('Correct!');
            $counter += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
        if ($counter === Engine\ROUNDCOUNT) {
            line('Congratulations, %s!', $name);
        }
    }
}
