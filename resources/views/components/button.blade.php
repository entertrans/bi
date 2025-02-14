@php
    // Warna button
    $colors = [
        'blue' => 'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800',
        'red' => 'text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900',
        'green' => 'text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900',
        'yellow' => 'text-yellow-700 hover:text-white border border-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900',
        'gray' => 'text-gray-700 hover:text-white border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:border-gray-500 dark:text-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-900',
        'purple' => 'text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-900',
        'cyan' => 'text-cyan-700 hover:text-white border border-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:border-cyan-500 dark:text-cyan-500 dark:hover:text-white dark:hover:bg-cyan-600 dark:focus:ring-cyan-900',
        'indigo' => 'text-indigo-700 hover:text-white border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:border-indigo-500 dark:text-indigo-500 dark:hover:text-white dark:hover:bg-indigo-600 dark:focus:ring-indigo-900',
        'black' => 'text-black hover:text-white border border-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-gray-500 dark:border-gray-700 dark:text-gray-700 dark:hover:text-white dark:hover:bg-gray-900 dark:focus:ring-gray-900',
    ];

    // Ukuran button
    $sizes = [
        'small' => 'text-xs px-2 py-1',
        'medium' => 'text-sm px-3 py-2', // Default
        'large' => 'text-base px-5 py-3',
    ];

    // Tentukan warna & ukuran tombol
    $buttonClass = ($colors[$color] ?? $colors['blue']) . ' ' . ($sizes[$type] ?? $sizes['medium']);
@endphp

<button type="button" class="{{ $buttonClass }} font-medium rounded-lg text-center me-2 mb-2">
    <a href="{{ $url }}">{{ $text }}</a>
</button>

{{--
cara pakai 
<x-button color="gray" type="large" url="#" text="Proceed to Payment" /> 
--}}
