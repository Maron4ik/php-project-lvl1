<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDCOUNT = 3;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
