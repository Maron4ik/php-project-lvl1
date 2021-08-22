<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

// phpcs:disable
error_reporting(0);
// phpcs:enable

function gcd()
{
    $name = Engine\greeting();
    $counter = 0;
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < Engine\ROUNDCOUNT; $i++) {
        $randNumber1 = rand(1, 10);
        $randNumber2 = rand(1, 10);
        $currectAnswer = gmp_gcd($randNumber1, $randNumber2);
        line('Question: %s %s', $randNumber1, $randNumber2);
        $answer = prompt("Your answer");
        if ($answer == $currectAnswer) {
            line('Currect!');
            $counter += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $currectAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
        if ($counter === 3) {
            line('Congratulations, %s!', $name);
        }
    }
}
