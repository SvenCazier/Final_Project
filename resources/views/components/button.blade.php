@props(['style' => 'contained'])

@php
    $styles = [
        'contained' => 'button button--contained',
        'outlined' => 'button button--outlined',
        'text' => 'button button--text',
    ];
@endphp

<button {{ $attributes->merge(['class' => $styles[$style]]) }}>{{ $slot }}</button>
