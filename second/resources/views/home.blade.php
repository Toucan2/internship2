@extends('layouts.app')

@section('content')
<table>
    <thead>
        <th>ID</th>
        <th>Acc. Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Rooms</th>
        <th>Phone</th>
        <th>Ow. Name</th>
        <th>Email</th>
    </thead>
    <tbody>
        @foreach($accommodations as $accommodation)

        <tr>
            <td>{{ $accommodation->id }}</td>
            <td>{{ $accommodation->acc_name }}</td>
            <td>{{ $accommodation->description }}</td>
            <td>{{ $accommodation->price }}</td>
            <td>{{ $accommodation->rooms }}</td>
            <td>{{ $accommodation->phone }}</td>
            <td>{{ $accommodation->name }}</td>
            <td>{{ $accommodation->owner_email }}</td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection