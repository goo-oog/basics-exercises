<?php
//## Exercise #6
//
//Write a console program in a class named *AsciiFigure* that draws a figure of the following form,
//using for loops.
/*
          ```
////////////////\\\\\\\\\\\\\\\\
////////////********\\\\\\\\\\\\
////////****************\\\\\\\\
////************************\\\\
********************************
```
Then, modify your program using an integer **class constant** so that it can create a similar figure
of any size. For instance, the diagram above has a size of 5. For example, the figure below has a size of 3:

```
////////\\\\\\\\
////********\\\\
****************
```*/

echo "\nASCII Figure\n\n";

class AsciiFigure
{
    private string $asciiFigure = "\n";

    public function drawFigure(string $lines):string
    {
        for ($i = 0; $i < $lines; $i++) {
            $this->asciiFigure .= str_repeat('/', ($lines - $i - 1) * 4);
            $this->asciiFigure .= str_repeat('*', $i * 8);
            $this->asciiFigure .= str_repeat('\\', ($lines - $i - 1) * 4);
            $this->asciiFigure .= "\n";
        }
        return $this->asciiFigure;
    }
}

$figure = new AsciiFigure();
do {
    $readline = readline('Enter a number of lines: ');
    if (ctype_digit($readline) && $readline > 0) {
        $input = $readline;
    } else {
        echo "Your input is not valid. Try again!\n";
    }
} while (!isset($input));
echo $figure->drawFigure($input);