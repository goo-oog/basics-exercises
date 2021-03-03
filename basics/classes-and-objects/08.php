<?php
/*## Exercise #8
Design a SavingsAccount class that stores a savings account’s annual interest rate and balance.
- The class constructor should accept the amount of the savings account’s starting balance.
- The class should also have methods for:
    - subtracting the amount of a withdrawal
    - adding the amount of a deposit
    - adding the amount of monthly interest to the balance
The monthly interest rate is the annual interest rate divided by twelve.
To add the monthly interest to the balance, multiply the monthly interest rate by the balance,
and add the result to the balance.

Test the class in a program that calculates the balance of a savings account at the end of a period
of time. It should ask the user for the annual interest rate, the starting balance,
and the number of months that have passed since the account was established.
A loop should then iterate once for every month, performing the following:

Ask the user for the amount deposited into the account during the month.
Use the class method to add this amount to the account balance.
Ask the user for the amount withdrawn from the account during the month.
Use the class method to subtract this amount from the account balance.
Use the class method to calculate the monthly interest.
After the last iteration, the program should display the ending balance, the total amount of deposits, the total amount of withdrawals, and the total interest earned.

Output should be similar to this:
```
How much money is in the account?: 10000
Enter the annual interest rate:5
How long has the account been opened? 4
Enter amount deposited for month: 1: 100
Enter amount withdrawn for 1: 1000
Enter amount deposited for month: 2: 230
Enter amount withdrawn for 2: 103
Enter amount deposited for month: 3: 4050
Enter amount withdrawn for 3: 2334
Enter amount deposited for month: 4: 3450
Enter amount withdrawn for 4: 2340
Total deposited: $7,830.00
Total withdrawn: $5,777.00
Interest earned: $29,977.72
Ending balance: $42,030.72
```*/

class SavingsAccount
{
    private int $balance;
    private float $annualInterestRate = 0.0;
    private int $totalDeposited = 0;
    private int $totalWithdrawn = 0;

    public function __construct(int $startingBalance)
    {
        $this->balance = $startingBalance;
    }

    public function balance(): int
    {
        return $this->balance;
    }

    public function annualInterestRate(): float
    {
        return $this->annualInterestRate;
    }

    public function totalDeposited(): int
    {
        return $this->totalDeposited;
    }

    public function totalWithdrawn(): int
    {
        return $this->totalWithdrawn;
    }

    public function setAnnualInterestRate(float $rate): void
    {
        $this->annualInterestRate = $rate;
    }

    public function deposit(int $deposit): void
    {
        $this->balance += $deposit;
        $this->totalDeposited += $deposit;
    }

    public function withdraw(int $withdrawal): void
    {
        $this->balance -= $withdrawal;
        $this->totalWithdrawn += $withdrawal;
    }

    public function addMonthlyInterest(): void
    {
        $this->balance += round($this->balance * $this->annualInterestRate / 100 / 12);
    }
}

do {
    $startingBalance = 100 * filter_var(readline('Enter the starting balance: '), FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => 0]]);
} while (!$startingBalance);

$account = new SavingsAccount($startingBalance);

do {
    $account->setAnnualInterestRate(filter_var(readline('Enter the annual interest rate: '), FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => 0]]));
} while (!$account->annualInterestRate());

do {
    $months = filter_var(readline('How long has the account been opened (in months): '), FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
} while (!$months);

for ($month = 1; $month <= $months; $month++) {
    $account->deposit(100 * filter_var(readline("Enter amount deposited for month: $month: "), FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => 0]]));
    $account->withdraw(100 * filter_var(readline("Enter amount withdrawn for month: $month: "), FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => 0]]));
    $account->addMonthlyInterest();
}

printf("\nStarting balance: %0.2f €\n", $startingBalance / 100);
printf("Total deposited: %0.2f €\n", $account->totalDeposited() / 100);
printf("Total withdrawn: %0.2f €\n", $account->totalWithdrawn() / 100);
printf("Interest earned: %0.2f €\n", ($account->balance() - $startingBalance - $account->totalDeposited() + $account->totalWithdrawn()) / 100);
printf("Ending balance: %0.2f €\n", $account->balance() / 100);
