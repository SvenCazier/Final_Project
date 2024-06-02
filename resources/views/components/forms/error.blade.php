@props(['error' => false])

@if ($error)
    <p class="error form__error">{{ $error }}</p>
@endif
