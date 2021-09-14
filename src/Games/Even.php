<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function numberEven(): void
{
    $gameData = [
        prepareQuestion(),
        prepareQuestion(),
        prepareQuestion()
    ];
    $rules = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    Engine\newEngine($gameData, $rules);
}

function prepareQuestion(): array
{
        $randomNumber = rand(2, 20);
        $correctAnswer = '';
        if ($randomNumber % 2 == 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

    $question = $randomNumber;

    return ['question' => $question, 'correctAnswer' => (string) $correctAnswer];
}

//function numberEven(): void
//{
//    for ($i = 0; $i < Engine\ROUNDCOUNT; $i++) {
//        $randomNumber = rand(2, 20);
//        $currectAnswer = '';
//        if ($randomNumber % 2 == 0) {
//            $currectAnswer = 'yes';
//        } else {
//            $currectAnswer = 'no';
//        }
//
//        line("Question: %s", $randomNumber);
//        $answer = prompt("Your answer");
//        if ($answer === $currectAnswer) {
//            line("Currect!");
//            $counter++;
//        } elseif ($answer === 'no') {
//            line("'no' is wrong answer ;(. Correct answer was 'yes'.'");
//            line("Let's try again, %s!", $name);
//            break;
//        } elseif ($answer === 'yes') {
//            line("'yes' is wrong answer ;(. Correct answer was 'no'.'");
//            line("Let's try again, %s!", $name);
//            break;
//        } else {
//            line("'%s' is wrong answer ;(. Correct answer was '%s'.'", $answer, $currectAnswer);
//            line("Let's try again, %s!", $name);
//            break;
//        }
//        if ($counter === 3) {
//            line("Congratulations, %s!", $name);
//        }
//    }
//}
