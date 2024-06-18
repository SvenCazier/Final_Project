@props(['name'])

<label for="{{ $name }}" class="switch" tabindex="0">
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox">
    <span class="slider"></span>
</label>
