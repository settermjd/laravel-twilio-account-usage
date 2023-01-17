<?php

namespace App\Twilio;

use JsonSerializable;
use Twilio\Rest\Api\V2010\Account\Usage\RecordInstance;

class JsonRecordInstance implements JsonSerializable
{
    private RecordInstance $recordInstance;

    public function __construct(RecordInstance $recordInstance)
    {
        $this->recordInstance = $recordInstance;
    }

    /**
     * @return array<int,JsonRecordInstance>
     */
    public function jsonSerialize(): mixed
    {
        // A list of the properties from RecordInstance to be render in the
        // JSON representation.
        $properties = [
            'accountSid' => '',
            'apiVersion' => '',
            'asOf' => '',
            'category' => '',
            'count' => '',
            'countUnit' => '',
            'description' => '',
            'endDate' => '',
            'price' => '',
            'priceUnit' => '',
            'startDate' => '',
            'subresourceUris' => '',
            'uri' => '',
            'usage' => '',
            'usageUnit' => '',
        ];

        foreach ($properties as $property => &$value) {
            $properties[$property] = $this->recordInstance->$property;
        }

        return $properties;
    }
}
