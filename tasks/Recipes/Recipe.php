<?php
declare(strict_types=1);

class Recipe
{
    private string $name;
    private array $ingredients;

    public function __construct(string $name, array $ingredientNames)
    {
        $this->name = $name;
        foreach ($ingredientNames as $ingredientName) {
            $this->ingredients[] = new Ingredient($ingredientName);
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function ingredients(): array
    {
        return $this->ingredients;
    }

    public function listIngredients(array $excludedIngredients = []): string
    {
        $listing = '';
        foreach ($this->ingredients() as $i => $ingredient) {
            if (!in_array($ingredient->name(), $excludedIngredients, true)) {
                $listing .= $ingredient->name();
                if ($i < (count($this->ingredients()) - 1)) {
                    $listing .= ', ';
                }
            }
        }
        return $listing;
    }

    public function isIngredientInRecipe(string $name): bool
    {
        foreach ($this->ingredients as $ingredient) {
            if ($ingredient->name() === $name) {
                return true;
            }
        }
        return false;
    }
}