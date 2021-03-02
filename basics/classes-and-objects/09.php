<?php
/*## Exercise #9
Add the following method:
```php
function show_user_name_and_balance() { }
```
Your method should return a string that contains the account's name and balance
separated by a comma and space. For example, if an account object named `ben`
has the name "Benson" and a balance of 17.25, the call of `ben.show_user_name_and_balance()` should return:
```
Benson, $17.25
```
There are some special cases you should handle. If the balance is negative,
put the - sign before the dollar sign. Also, always display the cents as a two-digit number.
For example, if the same object had a balance of -17.5, your method should return:
```
Nelson, -$17.50
```*/

class BankAccount
{
    private string $name;
    private int $balance;
    private NumberFormatter $currencyFmt;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance * 100;
        $this->currencyFmt = numfmt_create('en_US', NumberFormatter::CURRENCY);
    }

    public function showUserNameAndBalance(): string
    {
        return "$this->name, " . numfmt_format_currency($this->currencyFmt, $this->balance / 100, "USD");
    }
}

$account1 = new BankAccount('Benson', 17.5);
echo $account1->showUserNameAndBalance() . PHP_EOL;

$account2 = new BankAccount('Nelson', -17.5);
echo $account2->showUserNameAndBalance() . PHP_EOL;