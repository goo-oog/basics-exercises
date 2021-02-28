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
Ask the user for the amount withdrawn from the account during the month. Use the class method to subtract this amount from the account balance.
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