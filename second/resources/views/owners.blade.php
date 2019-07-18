@extends('layouts.app')

@section('content')
<table>
    <thead>
        <th>Owner ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Accommodations</th>
        <th>Income</th>
    </thead>
    <tbody>
        @foreach($owners as $owner)

        <tr>
            <td>{{ $owner->id }}</td>
            <td>{{ $owner->name }}</td>
            <td>{{ $owner->email }}</td>
            <td>{{ App\Http\Controllers\DBAccess::owner_totalAccommodations($owner->email) }}</td>
            <td>{{ App\Http\Controllers\DBAccess::owner_totalIncome($owner->email) }}</td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection