@php
    $originalMethod = $attributes['method'];
    $method = isset($originalMethod) ? strtoupper($originalMethod) : 'GET';
    if ($method !== 'GET') {
        $method = 'POST';
    }
    $attributesArray = $attributes->getAttributes();
    $attributesArray['method'] = $method;
    $attributes->setAttributes($attributesArray);
@endphp

<form {{ $attributes }}>
    @if ($attributes->get('method') !== 'GET')
        @csrf
        @if ($originalMethod !== 'POST')
            @method($originalMethod)
        @endif
        @honeypot
    @endif
    {{ $slot }}
</form>
