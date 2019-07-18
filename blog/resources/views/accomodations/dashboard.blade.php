@extends('accomodations.layout')


@section('title', 'Dashboard')


@section('header', 'Interactive Dashboard')


@section('content')

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<!-- <script type='text/javascript' src='{{asset("js/dashInteractivity.js")}}'></script> -->
<script type='text/javascript'>
    function save() {
        // update database:
        $.ajax({
            url: '/accomodations',
            type: 'POST',
            data: {
                _token: document.getElementsByName("_token")[0].value,
                name: $('#name').val(),
                description: $('#description').val(),
                telephone: $('#telephone').val(),
                price: $('#price').val(),
                rooms: $('#rooms').val()
            },
            success: function(data) {
                // update webpage:
                var markup = '<tr>' +
                    '<td>' + data.id + '</td>' +
                    '<td>' + data.name + '</td>' +
                    '<td>' + data.description + '</td>' +
                    '<td>' + data.phonenumber + '</td>' +
                    '<td>' + data.price + '</td>' +
                    '<td>' + data.roomcount + '</td>' +
                    '<td><button class="deleteBtn" onclick="remove()">del</button></td>' +
                    '</tr>';
                $('#accTable tbody').append(markup);

                console.log("database: created id=" + data.id);
            }
        });
    }

    function remove() {
        $('#accTable').on('click', '.deleteBtn', function() {
            // update webpage:
            var row = $(this).closest('tr');
            var id = row.find('td:first').html();
            row.remove();

            // update database:
            $.ajax({
                url: '/accomodations/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE'
                },
                success: function() {
                    console.log("database: deleted id=" + id);
                }
            });
        });    // why does this work ?! (2 on-click-listenters)
    }
</script>

{{ csrf_field() }}

<div>
    <input type="text" id='name' placeholder='Acc. Name'>
</div>

<div>
    <textarea id="description" placeholder="Acc. Description" cols="30" rows="10"></textarea>
</div>

<div>
    <input type="text" id='telephone' placeholder='Tel.'>
</div>

<div>
    <input type="number" id='price' step=0.01 placeholder='Price'>
</div>

<div>
    <input type="number" id='rooms' placeholder='Room Count'>
</div>

<button id='newAcc' onclick="save()">Save Accomodation to Server</button>

<br><br>

<table id="accTable">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Desc.</td>
        <td>Phone</td>
        <td>Price</td>
        <td>Rooms</td>
        <td>-</td>
    </tr>

    @foreach ($users as $user)

    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->description }}</td>
        <td>{{ $user->phonenumber }}</td>
        <td>{{ $user->price }}</td>
        <td>{{ $user->roomcount }}</td>
        <td><button class='deleteBtn' onclick="remove()">del</button></td>
    </tr>

    @endforeach
</table>

@endsection