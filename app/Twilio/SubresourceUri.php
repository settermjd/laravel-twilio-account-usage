<?php

namespace App\Twilio;

use JsonSerializable;
use Twilio\Rest\Api\V2010\Account\Usage\RecordInstance;

class SubresourceUri
{
    private string $allTime;
    private string $daily;
    private string $lastMonth;
    private string $monthly;
    private string $thisMonth;
    private string $today;
    private string $yearly;
    private string $yesterday;
}
