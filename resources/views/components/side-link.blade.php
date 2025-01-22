@props(['type', 'url' => '/', 'text' => ''])
{{-- {{ dd($type) }} --}}
@switch($type)
    @case('dashboard')
        <a href="{{ $url }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <x-icon name="dashboard" class="w-6 h-6 text-gray-800 dark:text-white" />
            <span class="ms-3">{{ $text }}</span>
        </a>
        @break

    @case('sub')
        <a href="{{ $url }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            {{ $text }}
        </a>
        @break

    @default
        <a href="{{ $url }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <x-icon :name="$icon" class="w-6 h-6 text-gray-800 dark:text-white" />
            <span class="ms-3">{{ $text }}</span>
        </a>
@endswitch
