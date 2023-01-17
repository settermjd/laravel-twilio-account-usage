<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Twilio\Rest\Api\V2010\Account\Usage\RecordInstance;
use Twilio\Rest\Client;

class DefaultController extends Controller
{
    public function getUsageDetails(Client $client)
    {
        return Response::view(
            'default',
            ['usageRecords' => $this->getUsage($client)]
        );
    }

    /**
     * @return array<int,RecordInstance>
     */
    private function getUsage(Client $client): array
    {
        return $client
            ->usage
            ->records
            ->read([], 20);
    }
}
