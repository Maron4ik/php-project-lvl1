<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDCOUNT = 3;

function newEngine(array $gameData, string $rules)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($rules);
    for ($i = 0; $i < ROUNDCOUNT; $i++) {
        $question = $gameData[$i]['question'];
        $correctAnswer = $gameData[$i]['correctAnswer'];

        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
}
