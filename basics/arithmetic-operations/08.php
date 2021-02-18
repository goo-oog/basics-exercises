<?php
//# Exercise #8
//todo:
// Foo Corporation needs a program to calculate how much to pay their hourly employees. The US Department of Labor
// requires that employees get paid time and a half for any hours over 40 that they work in a single week. For example, if an
// employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay. The State of Massachusetts requires
// that hourly employees be paid at least $8.00 an hour. Foo Corp requires that an employee not work more than 60 hours in
// a week.
// ######### Summary #########
// - An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
// - For every hour over 40, they get overtime = (base pay) × 1.5.
// - The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
// - If the number of hours is greater than 60, print an error message.
// Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
// Write a main method that calls this method for each of these employees:
//| Employee   | Base Pay | Hours Worked |
//| ---        | ---      | ---          |
//| Employee 1 |  $ 7.50  |     35       |
//| Employee 2 |  $ 8.20  |     47       |
//| Employee 3 |  $10.00  |     73       |

class Employee
{
    public string $name;
    public float $basePay;
    public int $hours;

    public function __construct(string $name, float $basePay, int $hours)
    {
        $this->name = $name;
        $this->basePay = $basePay;
        $this->hours = $hours;
    }
}

function calculatePayment(float $basePay, int $hours): string
{
    if ($basePay < 8) {
        return sprintf(': Base pay of ($%0.2F) is too low! Minimum amount: $8.00', $basePay) . "\n";
    }
    if ($hours > 60) {
        return ": Too many hours ($hours) worked! Maximum allowed: 60 hours per week.\n";
    }
    if ($hours > 40) {
        $overtime = $hours - 40;
    } else {
        $overtime = 0;
    }
    $totalPayment = $basePay * $hours + 1.5 * $basePay * $overtime;
    return sprintf(': Total payment: $%0.2F', $totalPayment) . "\n";
}

$employees[] = new Employee('John', 7.50, 35);
$employees[] = new Employee('Mary', 8.20, 47);
$employees[] = new Employee('Michael', 10.00, 73);
$employees[] = new Employee('Jeffrey', 9.40, 37);
$employees[] = new Employee('Samantha', 15.60, 41);
$employees[] = new Employee('Gupta', 8.95, 20);
$employees[] = new Employee('Jennifer', 13.30, 59);

foreach ($employees as $employee) {
    echo $employee->name . calculatePayment($employee->basePay, $employee->hours);
}