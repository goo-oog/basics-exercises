<?php

/*## Exercise #6
A soft drink company recently surveyed 12,467 of its customers and found that approximately 14 percent of those surveyed purchase one or more energy drinks per week.
Of those customers who purchase energy drinks, approximately 64 percent of them prefer citrus flavored energy drinks.

Write a program that displays the following:
- The approximate number of customers in the survey who purchased one or more energy drinks per week
- The approximate number of customers in the survey who prefer citrus flavored energy drinks*/

class Survey
{
    public function calculate_energy_drinkers(int $surveyed, float $purchased_energy_drinks): int
    {
        return floor($surveyed * $purchased_energy_drinks);
    }

    public function calculate_prefer_citrus(int $energy_drinkers, float $prefer_citrus_drinks): int
    {
        return floor($energy_drinkers * $prefer_citrus_drinks);
    }
}

$survey = new Survey();
$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;
$energy_drinkers = $survey->calculate_energy_drinkers($surveyed, $purchased_energy_drinks);
$prefer_citrus = $survey->calculate_prefer_citrus($energy_drinkers, $prefer_citrus_drinks);

echo 'Total number of people surveyed: ' . $surveyed . PHP_EOL;
echo "Approximately $energy_drinkers bought at least one energy drink" . PHP_EOL;
echo "$prefer_citrus of those " . 'prefer citrus flavored energy drinks' . PHP_EOL;
