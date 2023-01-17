@foreach ($usageRecords as $usageRecord)
    <tr>
        <td>
            <span class="hidden sm:block">{{ $formatDateAsString($usageRecord->asOf, 'long') }}</span>
            <span class="block sm:hidden">{{ $formatDateAsString($usageRecord->asOf) }}</span>
        </td>
        <td>{{ $usageRecord->description }}</td>
        <td class="hidden sm:block">{{ $usageRecord->count }}</td>
        <td>{{ $getFormattedPrice($usageRecord->price, $usageRecord->priceUnit) }}</td>
    </tr>
@endforeach
