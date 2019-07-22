@extends('layouts.app')

@section('head')
<style type='text/css'>
    .select {
        margin-right: 15px;
    }

    div.filter {
        margin: auto;
        width: 40%;
    }
</style>
@endsection

@section('content')
<div class='filter'>
    <select class="select" id="sort-select" onchange="onChange()">
        <option value="id">Sort by ID</option>
        <option value="price">Sort by Price</option>
    </select>

    <button onclick="showAll()">Show All</button><input id="email" type="text" placeholder="name@example.com"><button onclick="filter()">Filter</button>
</div>

<br>
<table id='table'>
    <thead>
        <th id='id'>ID</th>
        <th>Acc. Name</th>
        <th>Description</th>
        <th id='price'>Price</th>
        <th>Rooms</th>
        <th>Phone</th>
        <th>Ow. Name</th>
        <th>Email</th>
    </thead>
    <tbody>
        @foreach($accommodations as $accommodation)

        <tr>
            <td>{{ $accommodation->acc_id }}</td>
            <td>{{ $accommodation->acc_name }}</td>
            <td>{{ $accommodation->description }}</td>
            <td>{{ $accommodation->price }}</td>
            <td>{{ $accommodation->rooms }}</td>
            <td>{{ $accommodation->name }}</td>
            <td>{{ $accommodation->phone }}</td>
            <td>{{ $accommodation->email }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<script src='{{ asset("js/tabletool.js") }}'></script>
<script>
    function showAll() {
        $('#table tbody').find('tr').show();
    }

    function filter() {
        $('#table tbody').find('tr').hide();

        var email = document.getElementById('email').value;
        $('#table tbody').find('tr td:contains(' + email + ')').parent().show();
    }
</script>
@endsection