<?php
/*## Exercise #5
Create a class called *Date* that includes: three pieces of information as instance variables — a month, a
day and a year.
Your class should have a constructor that initializes the three instance variables and assumes that
the values provided are correct.
Provide a set and a get for each instance variable.
Provide a method DisplayDate that displays the month, day and year separated by forward slashes '#/#'  .
Write a test application named DateTest that demonstrates class *Date* capabilities.*/

class Date
{
    private int $year;
    private int $month;
    private int $day;

    public function __construct(int $year, int $month, int $day)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    /*public function setYear($year): void
    {
        $this->year = $year;
    }*/

    /*public function setMonth($month): void
    {
        $this->month = $month;
    }*/

    /*public function setDay($day): void
    {
        $this->day = $day;
    }*/

    public function displayDate(): string
    {
        return $this->getYear() . ' / ' . $this->getMonth() . ' / ' . $this->getDay();
    }
}

do {
    $year = filter_var(readline('Enter year (1-32767): '), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 32767]]);
} while (!$year);
do {
    $month = filter_var(readline('Enter month (1-12): '), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 12]]);
} while (!$month);
do {
    $day = filter_var(readline('Enter day (1-31): '), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 31]]);
} while (!$day);

$date = new Date($year, $month, $day);

function dateTest(Date $date): bool
{
    return checkdate($date->getMonth(), $date->getDay(), $date->getYear());
}

echo dateTest($date) ? $date->displayDate() . " is a valid date\n" : $date->displayDate() . " is an invalid date\n";
