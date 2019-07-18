@extends('layouts.app')

@section('content')
<table>
    <thead>
        <th>ID</th>
        <th>Acc. Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Rooms</th>
    </thead>
    <tbody>
        @foreach($accommodations as $accommodation)

        <tr>
            <td>{{ $accommodation->id }}</td>
            <td>{{ $accommodation->acc_name }}</td>
            <td>{{ $accommodation->description }}</td>
            <td>{{ $accommodation->price }}</td>
            <td>{{ $accommodation->rooms }}</td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection