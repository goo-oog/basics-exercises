<?php
declare(strict_types=1);

class AvailableIngredients
{
    /**
     * @var Ingredient[]
     */
    private array $ingredients = [];

    public function ingredients(): array
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;
    }

    /**
     * @return string[]
     */
    public function names(): array
    {
        return array_column($this->ingredients(), 'name');
    }
}
