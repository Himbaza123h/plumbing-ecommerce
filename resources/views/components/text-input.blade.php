@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '  dark:placeholder-gray-400 dark:text-white dark:bg-gray-600 border-gray-300 focus:border-green-900 focus:ring-green-900 ']) !!}>
