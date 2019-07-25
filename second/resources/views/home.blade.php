@extends('layouts.app')

@section('head')
<style type='text/css'>
    .select {
        margin-right: 15px;
    }

    div.filter {
        margin: auto;
        width: 50%;
    }

    #table tbody tr:hover {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class='filter'>
    <select class="select" id="sort-select" onchange="sort('home')">
        <option value="id">Sort by ID</option>
        <option value="price">Sort by Price</option>
    </select>

    <button onclick="showAll()">Show All</button>
    <input size="25" id="email-input" type="text" placeholder="ex. {{$auth_email}}">
    <button onclick="sort('myaccommodations')">Filter</button>
</div>

<br>
<table id='table'>
    <thead>
        <th id='id'>ID</th>
        <th>Acc. Name</th>
        <th>Description</th>
        <th id='price'>Price</th>
        <th>Rooms</th>
        <th>Ow. Name</th>
        <th>Phone</th>
        <th>Email</th>
    </thead>
    <tbody>
        @foreach($accommodations as $accommodation)

        <tr>
            <td>#{{ $accommodation->acc_id }}</td>
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
<!-- <script src='{{ asset("js/tableTool.js") }}'></script>
<script>
    function showAll() {
        $('#table tbody').find('tr').show();
    }

    function filter() {
        $('#table tbody').find('tr').hide();

        var email = document.getElementById('email').value;
        $('#table tbody').find('tr td:contains(' + email + ')').parent().show();
    }
</script> -->

<!-- Backend sort: -->
<script>
    $(function() {
        $('#table tbody tr').each(function(index) {
            $(this).click(function() {
                var id = $(document.getElementById('table').rows[index+1].cells[0]).text().substring(1);
                window.location.href = '/book?id=' + id;
            })
        })
    });

    function showAll() {
        $.ajax({
            url: '/api/home?sort=' + $('#sort-select').val(),
            type: 'GET',
            success: function(data) {
                // update front-end

                $('#table tbody').empty(); // first remove current <tbody> content

                // then add the sorted <tr>s
                for (var i = 0; i < data.length; i++) {
                    var markup = '<tr>' +
                        '<td>' + '#' + data[i].acc_id + '</td>' +
                        '<td>' + data[i].acc_name + '</td>' +
                        '<td>' + data[i].description + '</td>' +
                        '<td>' + data[i].price + '</td>' +
                        '<td>' + data[i].rooms + '</td>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].phone + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '</tr>';
                    $('#table tbody').append(markup);
                }
            }
        });
    }

    function sort(route) {
        $.ajax({
            url: '/api/' + route +
                '?sort=' + $('#sort-select').val() + // $('#sort-select').val()
                '&email=' + $('#email-input').val(), // $('#email-input').val()
            type: 'GET',
            success: function(data) {
                // update front-end

                $('#table tbody').empty(); // first remove current <tbody> content

                // then add the sorted <tr>s
                for (var i = 0; i < data.length; i++) {
                    var markup = '<tr>' +
                        '<td>' + '#' + data[i].acc_id + '</td>' +
                        '<td>' + data[i].acc_name + '</td>' +
                        '<td>' + data[i].description + '</td>' +
                        '<td>' + data[i].price + '</td>' +
                        '<td>' + data[i].rooms + '</td>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].phone + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '</tr>';
                    $('#table tbody').append(markup);
                }
            }
        });
    }
</script>
@endsection