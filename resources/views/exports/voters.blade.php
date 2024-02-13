<table>
    <thead>
        <tr>
            <th>Block No</th>
            <th>Serial No</th>
            <th>Family No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>CNIC</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($voters as $voter)
            <tr>
                <td>{{ $voter->block }}</td>
                <td>{{ $voter->serial_number }}</td>
                <td>{{ $voter->family_number }}</td>
                <td style="text-transform: capitalize;">{{ $voter->name }}</td>
                <td style="text-transform: capitalize;">{{ $voter->father_name }}</td>
                <td>{{ $voter->cnic }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
