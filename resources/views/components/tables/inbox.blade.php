@props(['tableData', 'id' => 'inbox'])

<table id="{{ $id }}" class="table table--inbox elevate">
    <thead>
        <tr class="table__row header header--table">
            <th class="table__cell">From</th>
            <th class="table__cell">Subject</th>
            <th class="table__cell">Received</th>
            <th class="table__cell"></th>
        </tr>
    </thead>
    @foreach ($tableData as $date => $rows)
        <tbody>
            <tr class="table__row header header--body">
                <th class="table__cell" colspan="4">{{ $date }}</th>
            </tr>
            @foreach ($rows as $row)
                <tr class="table__row message {{ !$row['is_handled'] ? 'highlight' : '' }}">
                    <a href="/messages/{{ $row['id'] }}">
                        <td class="table__cell from">{{ $row['from'] }}</td>
                        <td class="table__cell subject">
                            {{ __(App\Enums\ContactFormSubject::getLabel($row['subject'])) }}</td>
                        <td class="table__cell time"><time
                                datetime="{{ $row['fullUTCString'] }}">{{ $row['uTCTime'] }}</time>
                        </td>
                        <td class="table__cell">
                            {{-- <x-forms.form method="DELETE" action="/message/{{ $row['id'] }}">
                            <x-button class="button button--delete">delete</x-button>
                        </x-forms.form> --}}
                        </td>
                    </a>
                </tr>
            @endforeach
        </tbody>
    @endforeach
</table>
