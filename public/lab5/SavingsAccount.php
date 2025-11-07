<?php
declare(strict_types=1);

require_once __DIR__ . '/BankAccount.php';

class SavingsAccount extends BankAccount
{
    protected static float $interestRate = 5.0;

    public static function setInterestRate(float $percent): void
    {
        if ($percent < 0) {
            throw new InvalidArgumentException('Ставка не може бути від’ємною.');
        }
        self::$interestRate = $percent;
    }

    public static function getInterestRate(): float
    {
        return self::$interestRate;
    }

    public function applyInterest(): void
    {
        if ($this->balance <= 0) {
            return;
        }
        $delta = $this->balance * (self::$interestRate / 100.0);
        $this->balance += $delta;
    }
}
