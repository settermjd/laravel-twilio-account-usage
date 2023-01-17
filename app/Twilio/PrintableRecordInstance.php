<?php

namespace App\Twilio;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

class PrintableRecordInstance
{
    private string $accountSid;
    private string $apiVersion;
    private \DateTimeImmutable $asOf;
    private string $category;
    private int $count;
    private string $countUnit;
    private string $description;
    private \DateTimeImmutable $endDate;
    private int $price;
    private string $priceUnit;
    private \DateTimeImmutable $startDate;
    private array $subresourceUris;
    private string $uri;
    private int $usage;
    private string $usageUnit;
    private NumberFormatter $formatter;
    private IntlMoneyFormatter $moneyFormatter;

    public function __construct()
    {
        $currencies = new ISOCurrencies();
        $this->formatter = new NumberFormatter(
            'en_US', NumberFormatter::CURRENCY
        );
        $this->moneyFormatter = new IntlMoneyFormatter(
            $this->formatter, $currencies
        );
    }

    public function getAccountSid(): string
    {
        return $this->accountSid;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function getAsOf(): \DateTimeImmutable
    {
        return $this->asOf;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getCountUnit(): string
    {
        return $this->countUnit;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEndDate(): \DateTimeImmutable
    {
        return $this->endDate;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPriceUnit(): string
    {
        return $this->priceUnit;
    }

    public function getFormattedPrice(): string
    {
        return $this->formatter->formatCurrency(
            (float)$this->price,
            strtoupper($this->priceUnit)
        );
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getSubresourceUris(): array
    {
        return $this->subresourceUris;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getUsage(): int
    {
        return $this->usage;
    }

    public function getUsageUnit(): string
    {
        return $this->usageUnit;
    }

}
