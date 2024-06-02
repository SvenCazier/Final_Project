@props(['label', 'name', 'style' => 'standard'])

@php
    $inputClasses = [
        'filled' => 'input--filled',
        'outlined' => 'input--outlined',
        'standard' => 'input--standard',
    ];

    $defaultClasses = 'form__select ' . $inputClasses[$style];

    $defaults = [
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'class' => $defaultClasses,
    ];
@endphp

<x-forms.form-control :$label :$name>
    <select {{ $attributes($defaults) }}>
        {{ $slot }}
    </select>
</x-forms.form-control>
