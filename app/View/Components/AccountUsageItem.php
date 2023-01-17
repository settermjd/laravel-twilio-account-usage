<?php

namespace App\View\Components;

use App\Twilio\ArrayRecordInstance;
use Illuminate\View\Component;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;
use Twilio\Rest\Api\V2010\Account\Usage\RecordInstance;

class AccountUsageItem extends Component
{
    /**
     * @var array<int,RecordInstance>
     */
    public array $usageRecords;
    private IntlMoneyFormatter $moneyFormatter;
    private NumberFormatter $formatter;

    /**
     * @param array<int,RecordInstance> $usageRecords
     */
    public function __construct(array $usageRecords)
    {
        $this->usageRecords = $usageRecords;

        $currencies = new ISOCurrencies();
        $this->formatter = new NumberFormatter(
            'en_US', NumberFormatter::CURRENCY
        );
        $this->moneyFormatter = new IntlMoneyFormatter(
            $this->formatter, $currencies
        );
    }

    public function getFormattedPrice(string $price, string $priceUnit): string
    {
        return $this->formatter->formatCurrency(
            (float)$price,
            strtoupper($priceUnit)
        );
    }

    public function formatDateAsString(string $date, string $shortOrLong = 'short'): string
    {
        return (new \DateTimeImmutable($date))
            ->format($shortOrLong === 'long' ? 'd-m-Y G:i' : 'd-m-Y');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.account-usage-item');
    }
}
