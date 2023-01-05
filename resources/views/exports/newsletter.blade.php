<table>
    <thead>
    <tr>
        <th>Email Address</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($newsletters as $newsletter)
        <tr>
            <td>{{ $newsletter->email }}</td>
            <td>{{ $newsletter->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
