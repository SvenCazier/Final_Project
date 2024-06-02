<form {{ $attributes(['class' => 'form elevate', 'method' => 'GET']) }}>
    @if ($attributes->get('method', 'GET') != 'GET')
        @csrf
        @if ($attributes->get('method', 'GET') != 'POST')
            @method($attributes->get('method'))
        @endif
    @endif
    @honeypot

    {{ $slot }}
</form>
