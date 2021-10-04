<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function roundData(callable $getRightAnswerForRound, string $question): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($question);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer] = $getRightAnswerForRound();

        line("Question: {$roundQuestion}");
        $answerUser = prompt('Your answer');

        if ($answerUser === $rightAnswer) {
            line('Correct!');
        } else {
            line("{$answerUser}  is wrong answer ;(. Correct answer was {$rightAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
