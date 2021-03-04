<?php
declare(strict_types=1);

class AvailableIngredients
{
    private array $ingredients;

    public function ingredients(): array
    {
        return $this->ingredients;
    }

    public function query(): void
    {
        do {
            $numOfIngredients = filter_var(readline('How much ingredients do you have? '),
                FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
        } while ($numOfIngredients < 0);
        if ($numOfIngredients === 0) {
            exit("\nYou don't have any ingredients :-(\n");
        }
        for ($i = 1; $i <= $numOfIngredients; $i++) {
            $this->ingredients[] = new Ingredient(readline("Enter ingredient $i: "));
        }
    }

    public function names(): array
    {
        $names = [];
        foreach ($this->ingredients as $ingredient) {
            $names[] = $ingredient->name();
        }
        return $names;
    }
}