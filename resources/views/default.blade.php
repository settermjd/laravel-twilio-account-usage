@php use Twilio\Rest\Api\V2010\Account\Usage\RecordInstance; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Twilio Account Usage Details in Laravel</title>
</head>
<body class="antialiased">
<div class="mx-auto lg:w-7/12 lg:max-w-6xl mx-4">
    <div class="relative grid grid-cols-1 min-h-screen pr-8 py-4 sm:pt-0 md:mt-4">
        <h1 class="mb-6 text-4xl font-bold text-left">
            <svg class="mb-4 w-20 lg:w-28"
                 fill="#F22F46"
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 30 30"><path d="M15 0C6.7 0 0 6.7 0 15s6.7 15 15 15 15-6.7 15-15S23.3 0 15 0zm0 26C8.9 26 4 21.1 4 15S8.9 4 15 4s11 4.9 11 11-4.9 11-11 11zm6.8-14.7c0 1.7-1.4 3.1-3.1 3.1s-3.1-1.4-3.1-3.1 1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1zm0 7.4c0 1.7-1.4 3.1-3.1 3.1s-3.1-1.4-3.1-3.1c0-1.7 1.4-3.1 3.1-3.1s3.1 1.4 3.1 3.1zm-7.4 0c0 1.7-1.4 3.1-3.1 3.1s-3.1-1.4-3.1-3.1c0-1.7 1.4-3.1 3.1-3.1s3.1 1.4 3.1 3.1zm0-7.4c0 1.7-1.4 3.1-3.1 3.1S8.2 13 8.2 11.3s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1z"/></svg>
            Your Twilio Account Usage
        </h1>
        <p class="text-2xl text-left mb-8">Below you can find your Twilio usage statement for the last month.</p>
        <table>
            <thead>
            <tr>
                <th>As Of</th>
                <th>Description</th>
                <th class="hidden sm:block">Count</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                <x-account-usage-item :usage-records="$usageRecords" />
            </tbody>
        </table>
    </div>
</div>
<footer class="mx-auto w-full xl:w-7/12 xl:max-w-6xl mx-4">
    <div class="text-sm text-slate-600 md:text-center">
        &copy; {{ date('Y') }} Twilio. All rights reserved. <br>
        Design and developed by Matthew Setter.
    </div>
</footer>
</body>
</html>
