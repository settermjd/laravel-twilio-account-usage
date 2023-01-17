@foreach ($usageRecords as $usageRecord)
    <tr>
        <td>
            <span class="hidden sm:block">{{ $usageRecord->getAsOf()->format('d-m-Y G:i') }}</span>
            <span class="block sm:hidden">{{ $usageRecord->getAsOf()->format('d-m-Y') }}</span>
        </td>
        <td>{{ $usageRecord->getDescription() }}</td>
        <td class="hidden sm:block">{{ $usageRecord->getCount() }}</td>
        <td>{{ $usageRecord->getFormattedPrice() }}</td>
    </tr>
@endforeach
