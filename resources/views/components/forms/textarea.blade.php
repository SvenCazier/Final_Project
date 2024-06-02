@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'style' => 'standard', 'rows' => '4'])

@php
    $inputClasses = [
        'filled' => 'input--filled',
        'outlined' => 'input--outlined',
        'standard' => 'input--standard',
    ];

    $defaultClasses = 'form__input ' . $inputClasses[$style];

    $defaults = [
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'placeholder' => $placeholder,
        'class' => $defaultClasses,
        'rows' => $rows,
    ];
@endphp

<x-forms.form-control :label="$label" :name="$name">
    <textarea {{ $attributes($defaults) }}></textarea>
</x-forms.form-control>
