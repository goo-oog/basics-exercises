<?php
declare(strict_types=1);

require_once 'Ingredient.php';
require_once 'AvailableIngredients.php';
require_once 'Recipe.php';
require_once 'Cookbook.php';

$cookbook = new Cookbook();
$cookbook->addRecipe(new Recipe('Cheese salad', ['cheese', 'egg', 'carrot', 'mayonnaise']));
$cookbook->addRecipe(new Recipe('Sausage salad', ['sausage', 'potato', 'cucumber', 'mayonnaise']));
$cookbook->addRecipe(new Recipe('Pancakes', ['flour', 'egg', 'milk', 'oil']));
$cookbook->addRecipe(new Recipe('Soup', ['meat', 'potato', 'carrot', 'onion']));
$cookbook->addRecipe(new Recipe('Porridge', ['oats', 'milk']));
$cookbook->addRecipe(new Recipe('Omelette', ['egg']));

echo "\n════════╗\n";
echo "Recipes:║\n";
echo "════════╝\n";

/* @var $recipe Recipe */
foreach ($cookbook->recipes() as $recipe) {
    echo str_repeat(' ', 15 - strlen($recipe->name())) . $recipe->name() . ':  ';
    echo $recipe->listIngredients() . "\n";
}


echo "\n══════════════════════╗\n";
echo "Available ingredients:║\n";
echo "══════════════════════╝\n";

$availableIngredients = new AvailableIngredients();
$availableIngredients->query();


echo "\n══════════════════════════════════╗\n";
echo "With these ingredients I can make:║\n";
echo "══════════════════════════════════╝\n";

$excludedIngredients = $availableIngredients->names();
/* @var $recipe Recipe */
foreach ($cookbook->recipes() as $recipe) {
    $listing = '';
    /* @var $availableIngredient Ingredient */
    foreach ($availableIngredients->ingredients() as $availableIngredient) {
        if ($recipe->isIngredientInRecipe($availableIngredient->name())) {
            echo $recipe->name();
            if ($recipe->listIngredients($excludedIngredients) !== '') {
                echo ":\n  - Missing ingredients:\n    - ";
                echo $recipe->listIngredients($excludedIngredients) . "\n";
            } else {
                echo ":\n  - You have all ingredients\n";
            }
            break;
        }
    }
}