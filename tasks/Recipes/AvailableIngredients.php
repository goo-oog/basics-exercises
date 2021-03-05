<?php
declare(strict_types=1);

class AvailableIngredients
{
    /**
     * @var Ingredient[]
     */
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
        } while ($numOfIngredients === false);
        if ($numOfIngredients === 0) {
            exit("\nYou don't have any ingredients :-(\n");
        }
        for ($i = 1; $i <= $numOfIngredients; $i++) {
            $this->ingredients[] = new Ingredient(readline("Enter the ingredient $i: "));
        }
    }

    /**
     * @return string[]
     */
    public function names(): array
    {
        return array_column($this->ingredients(), 'name');
    }
}
