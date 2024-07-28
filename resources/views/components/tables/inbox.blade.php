@props(['tableData', 'id' => 'inbox'])

<table id="{{ $id }}" class="table table--inbox elevate">
    <thead>
        <tr class="table__row header header--table">
            <th class="table__cell">{{ __('inbox.from') }}</th>
            <th class="table__cell">{{ __('inbox.subject') }}</th>
            <th class="table__cell">{{ __('inbox.received') }}</th>
            <th class="table__cell"></th>
        </tr>
    </thead>
    @foreach ($tableData as $date => $rows)
        <tbody>
            <tr class="table__row header header--body">
                <th class="table__cell" colspan="4">{{ $date }}</th>
            </tr>
            @foreach ($rows as $row)
                <tr data-href="{{ url()->current() }}/message/{{ $row['id'] }}"
                    class="table__row message {{ !$row['is_handled'] ? 'highlight' : '' }}" tabindex="0">
                    <td class="table__cell from">{{ $row['from'] }}</td>
                    <td class="table__cell subject">
                        {{ __(App\Enums\ContactFormSubject::getLabel($row['subject'])) }}</td>
                    <td class="table__cell time"><time
                            datetime="{{ $row['fullUTCString'] }}">{{ $row['uTCTime'] }}</time>
                    </td>
                    <td class="table__cell">
                        <x-forms.form method="DELETE" action="/{{ app()->getLocale() }}/message/{{ $row['id'] }}">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <title>{{ __('buttons.delete') }}</title>
                                    <path class="svg--black"
                                        d="M10.4,1.1c0.3-0.7,1-1.1,1.8-1.1h7.5c0.8,0,1.4,0.4,1.8,1.1L21.9,2h6c1.1,0,2,0.9,2,2s-0.9,2-2,2H4C2.9,6,2,5.1,2,4 s0.9-2,2-2h6L10.4,1.1z M4,8h23.9v19.9c0,2.2-1.8,4-4,4H8c-2.2,0-4-1.8-4-4V8z M10,11.9c-0.5,0-1,0.4-1,1v13.9c0,0.5,0.4,1,1,1 s1-0.4,1-1V12.9C11,12.4,10.5,11.9,10,11.9z M15.9,11.9c-0.5,0-1,0.4-1,1v13.9c0,0.5,0.4,1,1,1s1-0.4,1-1V12.9 C16.9,12.4,16.5,11.9,15.9,11.9z M21.9,11.9c-0.5,0-1,0.4-1,1v13.9c0,0.5,0.4,1,1,1c0.5,0,1-0.4,1-1V12.9 C22.9,12.4,22.5,11.9,21.9,11.9z" />
                                </svg>
                            </button>
                        </x-forms.form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endforeach
</table>
@if (!count($tableData))
    <div class="emptyInboxMessage">
        <p>{{ __('admin.Nothing to display') }}</p>
    </div>
@endif
