<?php
declare(strict_types=1);

class Recipe
{
    private string $name;
    /**
     * @var Ingredient[]
     */
    private array $ingredients;

    /**
     * @param string $name
     * @param string[] $ingredientNames
     */
    public function __construct(string $name, array $ingredientNames)
    {
        $this->name = $name;
        $this->ingredients = array_map(static fn($ingredientName) => new Ingredient($ingredientName), $ingredientNames);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function listIngredients(array $excludedIngredients = []): string
    {
        $listing = '';
        foreach ($this->ingredients as $i => $ingredient) {
            if (!in_array($ingredient->name(), $excludedIngredients, true)) {
                $listing .= $ingredient->name();
                if ($i < (count($this->ingredients) - 1)) {
                    $listing .= ', ';
                }
            }
        }
        return $listing;
    }

    public function isIngredientInRecipe(string $name): bool
    {
        return in_array($name, array_column($this->ingredients, 'name'), true);
    }
}
