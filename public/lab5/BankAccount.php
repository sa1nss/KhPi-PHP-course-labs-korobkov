<?php
declare(strict_types=1);

require_once __DIR__ . '/AccountInterface.php';

class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0.0;

    protected float $balance;
    protected string $currency;

    public function __construct(string $currency = 'UAH', float $initialBalance = 0.0)
    {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new InvalidArgumentException('Початковий баланс не може бути меншим за мінімальний.');
        }
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Сума поповнення має бути більшою за нуль.');
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Сума зняття має бути більшою за нуль.');
        }
        if ($amount > $this->balance) {
            throw new RuntimeException('Недостатньо коштів на рахунку.');
        }
        $this->balance -= $amount;
        if ($this->balance < self::MIN_BALANCE) {
            $this->balance = self::MIN_BALANCE;
        }
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function __toString(): string
    {
        return number_format($this->balance, 2, '.', ' ') . ' ' . $this->currency;
    }
}
