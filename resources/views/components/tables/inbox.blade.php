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
                <tr data-href="{{ url()->current() }}/messages/{{ $row['id'] }}"
                    class="table__row message {{ !$row['is_handled'] ? 'highlight' : '' }}">
                    <td class="table__cell from">{{ $row['from'] }}</td>
                    <td class="table__cell subject">
                        {{ __(App\Enums\ContactFormSubject::getLabel($row['subject'])) }}</td>
                    <td class="table__cell time"><time
                            datetime="{{ $row['fullUTCString'] }}">{{ $row['uTCTime'] }}</time>
                    </td>
                    <td class="table__cell">
                        <x-forms.form method="DELETE" action="/{{ app()->getLocale() }}/messages/{{ $row['id'] }}">
                            <x-button style="text">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </x-button>
                        </x-forms.form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endforeach
</table>
@if (!count($tableData))
    <p>Nothing to display</p>
@endif
