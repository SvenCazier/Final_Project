@props(['tableData'])

<table>
    <thead>
        <tr>
            @foreach ($tableData->first() as $columnName => $value)
                <th>{{ $columnName }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($tableData as $row)
            <tr>
                @foreach ($row as $columnValue)
                    <td>{{ $columnValue }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
