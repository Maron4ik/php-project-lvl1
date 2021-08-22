<?php

namespace BrainGames\Games\Calc;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function numberCalc()
{
    $name = Engine\greeting();
    $counter = 0;
    $characters = '+-*';
    $L = strlen($characters);
    line('What is the resultof the expression?');
    for ($i = 0; $i < Engine\ROUNDCOUNT; $i++) {
        $randCharacter = $characters[rand(0, $L - 1)];
        $randNumber1 = rand(1, 10);
        $randNumber2 = rand(1, 10);
        $currectAnswer = 0;

        if ($randCharacter === '+') {
            $currectAnswer = $randNumber1 + $randNumber2;
        } elseif ($randCharacter === '-') {
            $currectAnswer = $randNumber1 - $randNumber2;
        } else {
            $currectAnswer = $randNumber1 * $randNumber2;
        }
        line('Question %s %s %s', $randNumber1, $randCharacter, $randNumber2);
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
