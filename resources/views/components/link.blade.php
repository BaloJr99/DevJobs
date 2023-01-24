@php
    $classes = "underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md ;"
    
@endphp

<a {{ $attributes -> merge(['class' => $classes]) }} href="{{ route('password.request') }}">
    {{ $slot }}
</a>