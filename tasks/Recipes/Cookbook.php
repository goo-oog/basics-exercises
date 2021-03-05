<?php
declare(strict_types=1);

class Cookbook
{
    /**
     * @var Recipe[]
     */
    private array $recipes;

    public function addRecipe(Recipe $recipe): void
    {
        $this->recipes[] = $recipe;
    }

    public function recipes(): array
    {
        return $this->recipes;
    }
}
