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
        <option value="price">Sort by Price</option>
    </select>
</div>

<br>
<table id="table">
    <thead>
        <th id='id'>ID</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th id='cost'>Cost</th>
    </thead>
    <tbody>
        @foreach($bookings as $booking)

        <tr>
            <td>#{{ $booking->acc_id }}</td>
            <td>{{ $booking->start_date }}</td>
            <td>{{ $booking->end_date }}</td>
            <td>{{ $booking->cost }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<!-- <script src='{{ asset("js/tableTool.js") }}'></script> -->
<script>
    function sort() {
        $.ajax({
            url: '/api/mybookings?sort=' + $('#sort-select').val(),
            type: 'GET',
            success: function(data) {
                // update front-end

                $('#table tbody').empty();  // first remove current <tbody> content

                // then add the sorted <tr>s
                for (var i = 0; i < data.length; i++) {
                    var markup = '<tr>' +
                        '<td>' + '#' + data[i].acc_id + '</td>' +
                        '<td>' + data[i].start_date + '</td>' +
                        '<td>' + data[i].end_date + '</td>' +
                        '<td>' + data[i].cost + '</td>' +
                        '</tr>';
                    $('#table tbody').append(markup);
                }
            }
        });
    }
</script>
@endsection