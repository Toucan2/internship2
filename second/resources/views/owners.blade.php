@extends('layouts.app')

@section('head')
<style>
    div.filter {
        margin: auto;
        width: 10%;
    }
</style>
@endsection

@section('content')
<div class="filter">
    <select class='select' id="sort-select" onchange="sort()">
        <option value="id">Sort by ID</option>
        <option value="income">Sort by Income</option>
        <option value="total">Sort by Accommodations</option>
    </select>
</div>

<br>
<table id='table'>
    <thead>
        <tr>
            <th id='id'>Owner ID</th>
            <th>Name</th>
            <th>Email</th>
            <th id='accommodations'>Accommodations</th>
            <th id='price'>Income</th>
        </tr>
    </thead>
    <tbody>
        @foreach($owners as $owner)

        <tr>
            <td>{{ $owner->id }}</td>
            <td>{{ $owner->name }}</td>
            <td>{{ $owner->email }}</td>
            <td>{{ $owner->total }}</td>
            <td>{{ $owner->income }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<!-- <script src='{{ asset("js/tableTool.js") }}'></script> -->
<script>
    function sort() {
        $.ajax({
            url: '/api/owners?sort=' + $('#sort-select').val(),
            type: 'GET',
            success: function(data) {
                // update front-end

                $('#table tbody').empty();  // first remove current <tbody> content

                // then add the sorted <tr>s
                for (var i = 0; i < data.length; i++) {
                    var markup = '<tr>' +
                        '<td>' + data[i].id + '</td>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].total + '</td>' +
                        '<td>' + data[i].income + '</td>' +
                        '</tr>';
                    $('#table tbody').append(markup);
                }
            }
        });
    }
</script>

@endsection