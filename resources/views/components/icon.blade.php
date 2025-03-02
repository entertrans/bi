@props(['name'])

@switch($name)
    @case('dashboard')
        <svg {{ $attributes->merge(['class' => 'w-6 h-6 text-gray-800 dark:text-white']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
        </svg>
        @break

    @case('dropdown')
        <svg {{ $attributes->merge(['class' => 'w-3 h-3']) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6" aria-hidden="true">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
        @break

    @case('kesiswaan')
        <svg {{ $attributes->merge(['class' => 'w-5 h-5 text-gray-800 dark:text-white']) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20" aria-hidden="true">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"></path>
        </svg>
        @break

    @case('raport')
        <svg {{ $attributes->merge(['class' => 'w-5 h-5 text-gray-800 dark:text-white']) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20" aria-hidden="true">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"></path>
        </svg>
        @break

    @case('keuangan')
        <svg {{ $attributes->merge(['class' => 'w-5 h-5 text-gray-800 dark:text-white']) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20" aria-hidden="true">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.0001 18-.8536-.8536c-.0937-.0937-.1464-.2209-.1464-.3535v-4.4172c0-.2422-.08794-.4762-.24744-.6585L4.45127 5.6585C3.88551 5.01192 4.34469 4 5.20385 4H18.7547c.8658 0 1.3225 1.02544.7433 1.66896L16.5001 9m-2.5 9.3754c.3347.3615.7824.6134 1.2788.7195.4771.1584 1.0002.1405 1.464-.05.4638-.1906.8338-.5396 1.0356-.977.2462-.8286-.6363-1.7337-1.7735-1.9948-1.1372-.2611-2.016-1.1604-1.7735-1.9948.2016-.4375.5716-.7868 1.0354-.9774.4639-.1905.9871-.2082 1.4643-.0496.491.1045.9348.3517 1.2689.7067m-1.9397 5.41V20m0-8v.9771"></path>
        </svg>
        @break
    @case('detail')
        <svg {{ $attributes->merge(['class' => 'w-5 h-5 text-gray-800 dark:text-white']) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20" aria-hidden="true" width="24" height="24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
        </svg>
        @break

    @case('table')
        <svg {{ $attributes->merge(['class' => 'w-4 h-4 ms-1']) }} xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"></path>
        </svg>
        @break

    @default
        <span>Icon not found</span>
@endswitch
