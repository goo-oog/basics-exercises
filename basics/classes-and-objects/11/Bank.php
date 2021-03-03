<?php
declare(strict_types=1);

class Bank
{
    private array $accounts;

    public function createAccount(Account $account): void
    {
        $this->accounts[] = $account;
    }

    private function findAccount(string $name): Account
    {
        foreach ($this->accounts as $i => $account) {
            if ($account->name() === $name) {
                return $this->accounts[$i];
            }
        }
        throw new OutOfRangeException("\x1B[1;97;41m Such account '$name' does not exist \x1B[0m");
    }

    public function accountInfo(string $name): string
    {
        $account = $this->findAccount($name);
        return $account->name() . ' balance: ' . $account->balance() . ' €';
    }

    public function deposit(string $name, float $amount): void
    {
        $this->findAccount($name)->deposit($amount);
    }

    public function withdraw(string $name, float $amount): float
    {
        return $this->findAccount($name)->withdraw($amount);
    }

    public function transferMoney(string $from, string $to, float $amount): void
    {
        $fromAccount = $this->findAccount($from);
        $toAccount = $this->findAccount($to);
        if (isset($fromAccount, $toAccount)) {
            $transfer = $fromAccount->withdraw($amount);
            $toAccount->deposit($transfer);
        }
    }
}
