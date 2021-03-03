<?php
declare(strict_types=1);
//## Exercise #11
// Bank accounts with exceptions

require_once 'Account.php';
require_once 'Bank.php';

$bank = new Bank();
$bank->createAccount(new Account("Mat's account", 1000.00));
$bank->createAccount(new Account('My account', 0.00));

function printAccountInfo(Bank $bank, string $name): void
{
    try {
        echo $bank->accountInfo($name) . "\n";

    } catch (OutOfRangeException $exception) {
        echo $exception;
    }
}

// no Exceptions
echo "\x1B[1;97;42m no exceptions \x1B[0m\n";
printAccountInfo($bank, "Mat's account");
printAccountInfo($bank, 'My account');
try {
    $bank->transferMoney("Mat's account", 'My account', 100.00);
} catch (OutOfRangeException | UnexpectedValueException $exception) {
    echo $exception;
}
echo "\n";
printAccountInfo($bank, "Mat's account");
printAccountInfo($bank, 'My account');
echo "\n\n\n";

// wrong "from" Account name
try {
    $bank->transferMoney("Mt's account", 'My account', 100.00);
} catch (OutOfRangeException | UnexpectedValueException $exception) {
    echo $exception;
}
echo "\n";
printAccountInfo($bank, "Mat's account");
printAccountInfo($bank, 'My account');
echo "\n\n\n";

// wrong "to" Account name
try {
    $bank->transferMoney("Mat's account", 'Myy account', 100.00);
} catch (OutOfRangeException | UnexpectedValueException $exception) {
    echo $exception;
}
echo "\n";
printAccountInfo($bank, "Mat's account");
printAccountInfo($bank, 'My account');
echo "\n\n\n";

// insufficient funds in "from" account
$bank->withdraw("Mat's account", 850.00);
printAccountInfo($bank, "Mat's account");
printAccountInfo($bank, 'My account');
try {
    $bank->transferMoney("Mat's account", 'My account', 100.00);
} catch (OutOfRangeException | UnexpectedValueException $exception) {
    echo $exception;
}
echo "\n";
printAccountInfo($bank, "Mat's account");
printAccountInfo($bank, 'My account');
