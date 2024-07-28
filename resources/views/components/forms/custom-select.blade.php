@props(['label', 'name', 'style' => 'standard', 'options' => []])

@php
    $inputClasses = [
        'filled' => 'input--filled',
        'outlined' => 'input--outlined',
        'standard' => 'input--standard',
    ];

    $currentValue = old($name) ?? $options[0]['value'];
    $defaultClasses = 'form__select custom__select ' . $inputClasses[$style];

    $hiddenInputDefaults = [
        'name' => $name,
        'value' => $currentValue,
        'type' => 'hidden',
    ];

    $currentLabel = '';
    foreach ($options as $option) {
        if ($option['value'] == $currentValue) {
            $currentLabel = __($option['label']);
            break;
        }
    }

    $visibleInputDefaults = [
        'id' => $name,
        'value' => $currentLabel,
        'class' => $defaultClasses,
        'type' => 'text',
    ];
@endphp

<x-forms.form-control :label="$label" :name="$name">
    <input {{ $attributes($hiddenInputDefaults) }} readonly />
    <input {{ $attributes($visibleInputDefaults) }} readonly />
    <ul class="custom__select__options">
        @foreach ($options as $option)
            <li data-value="{{ $option['value'] }}">{{ __($option['label']) }}</li>
        @endforeach
    </ul>
</x-forms.form-control>
