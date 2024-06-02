@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'style' => 'standard'])

@php
    $inputClasses = [
        'filled' => 'input--filled',
        'outlined' => 'input--outlined',
        'standard' => 'input--standard',
    ];

    $defaultClasses = 'form__input ' . $inputClasses[$style];

    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'placeholder' => $placeholder,
        'class' => $defaultClasses,
    ];
@endphp

<x-forms.form-control :label="$label" :name="$name">
    <input {{ $attributes($defaults) }}>
</x-forms.form-control>
