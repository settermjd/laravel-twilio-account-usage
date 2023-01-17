<?php

namespace App\View\Components;

use App\Twilio\ArrayRecordInstance;
use App\Twilio\PrintableRecordInstance;
use Illuminate\View\Component;
use Laminas\Hydrator\NamingStrategy\UnderscoreNamingStrategy;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\Hydrator\Strategy\DateTimeFormatterStrategy;
use Laminas\Hydrator\Strategy\DateTimeImmutableFormatterStrategy;
use Laminas\Hydrator\Strategy\ScalarTypeStrategy;
use Twilio\Rest\Api\V2010\Account\Usage\RecordInstance;

class AccountUsageItem extends Component
{
    /**
     * @var array<int,RecordInstance>
     */
    public array $usageRecords;

    /**
     * @param array<int,RecordInstance> $usageRecords
     */
    public function __construct(array $usageRecords)
    {
        $hydrator = new ReflectionHydrator();
        $hydrator->setNamingStrategy(new UnderscoreNamingStrategy());
        $hydrator->addStrategy(
            'asOf',
            new DateTimeImmutableFormatterStrategy(
                new DateTimeFormatterStrategy('Y-m-d\TG:i:sP')
            )
        );
        $hydrator->addStrategy(
            'endDate',
            new DateTimeImmutableFormatterStrategy(
                new DateTimeFormatterStrategy('Y-m-d\TG:i:sP')
            )
        );
        $hydrator->addStrategy(
            'startDate',
            new DateTimeImmutableFormatterStrategy(
                new DateTimeFormatterStrategy('Y-m-d\TG:i:sP')
            )
        );
        $hydrator->addStrategy('count', ScalarTypeStrategy::createToInt());
        $hydrator->addStrategy('price', ScalarTypeStrategy::createToInt());
        $hydrator->addStrategy('usage', ScalarTypeStrategy::createToInt());

        $subresourceUriHydrator = new ReflectionHydrator();
        $subresourceUriHydrator->setNamingStrategy(new UnderscoreNamingStrategy());

        foreach ($usageRecords as $usageRecord) {
            $this->usageRecords[] = $hydrator->hydrate(
                $usageRecord->toArray(),
                new PrintableRecordInstance()
            );
        }
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
