<?php
//### Exercise #6
//Write a program to play a word-guessing game like Hangman.
//
//- It must randomly choose a word from a list of words.
//- It must stop when all the letters are guessed.
//- It must give them limited tries and stop after they run out.
//- It must display letters they have already guessed (either only the incorrect guesses or all guesses).

$words = ['development', 'appointment', 'environment', 'establishment', 'interaction',
    'competition', 'manufacturer', 'instruction', 'information', 'organization',
    'significance', 'understanding', 'explanation', 'distribution', 'engineering',
    'introduction', 'imagination', 'construction', 'entertainment', 'association',
    'grandmother', 'relationship', 'application', 'replacement', 'championship',
    'advertising', 'recommendation', 'supermarket', 'perspective', 'refrigerator',
    'responsibility', 'preparation', 'examination', 'satisfaction', 'maintenance',
    'requirement', 'recognition', 'administration', 'combination', 'performance',
    'negotiation', 'independence', 'measurement', 'improvement', 'conversation',
    'presentation', 'contribution', 'description', 'personality', 'possibility'];

function getInput(string $prompt, string $pattern = '/^[a-z]{1}$/'): string
{
    do {
        $isInputValid = false;
        $readline = readline($prompt);
        if (preg_match($pattern, $readline)) {
            $input = $readline;
            $isInputValid = true;
        } else {
            echo "\n   Error:     Enter only one lowercase letter!\n\n";
        }
    } while (!$isInputValid);
    return $input;
}

function drawScreen(array $placeholder, array $misses, array $lives): void
{
    echo "\n-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n\n";
    echo "   Word:      " . implode(' ', $placeholder) . "\n\n";
    echo "   Misses:    " . implode(' ', $misses) . "\n\n";
    echo "   Lives:     " . implode(' ', $lives) . "\n\n";
}

while (!isset($quit)) {
    $word = str_split($words[array_rand($words, 1)]);
    $placeholder = array_fill(0, count($word), '_');
    $misses = [];
    $lives = array_fill(0, 3, '♥');
    $gameOver = false;
    while ($gameOver == false) {
        drawScreen($placeholder, $misses, $lives);
        $guess = getInput('   Guess:     ');
        if (in_array($guess, $word)) {
            $indexesOfFoundLetter = array_keys($word, $guess);
            foreach ($indexesOfFoundLetter as $i) {
                $placeholder[$i] = $guess;
            }
        } else {
            if (!in_array($guess, $misses)) {
                $misses[] = $guess;
                sort($misses);
            }
            array_pop($lives);
        }
        if (count($lives) == 0) {
            $gameOver = true;
            drawScreen($word, $misses, ['Game Over!']);
        } elseif (!in_array('_', $placeholder)) {
            $gameOver = true;
            array_push($lives, '    Congratulations!');
            drawScreen($word, $misses, $lives);
        }
    }
    if (getInput('   Enter (c) to continue or (q) to quit:     ', '/^[cq]{1}$/') == 'q') {
        $quit = true;
    }
}