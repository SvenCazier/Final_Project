@props(['messageData'])

<article class="message-card elevate">
    <header class="message-card__header">
        <h3 class="header__title">{{ __(App\Enums\ContactFormSubject::getLabel($messageData->subject)) }}</h3>
        <p><strong>{{ __('inbox.from') }}:</strong> {{ $messageData->from }} ({{ $messageData->email }})</p>
        <p><strong>{{ __('inbox.date') }}:</strong> {{ $messageData->created_at->toDateString() }}</p>
        <p><strong>{{ __('inbox.time') }}:</strong> {{ $messageData->created_at->toTimeString() }}</p>
    </header>
    <hr>
    <main class="message-card__content">
        {{ $messageData->message }}
    </main>
    <footer class="message-card__footer">
        <x-forms.form method="DELETE" action="/{{ app()->getLocale() }}/messages/{{ $messageData->id }}">
            <x-button>{{ __('buttons.delete') }}</x-button>
        </x-forms.form>
    </footer>
</article>
