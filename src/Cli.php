<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

//hello

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
