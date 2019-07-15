@extends('accomodations.layout')


@section('title', 'Dashboard')


@section('header', 'Interactive Dashboard')


@section('content')

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<!-- <script type='text/javascript' src='/home/test/internship/blog/public/js/dashInteractivity.js'></script> -->
<script type='text/javascript'>
    // console.log('Script running\n');
    // $(
    //     $('#newAcc').click(
    //         function() {
    //             console.log("inside");

    //             var markup = '<tr>' +
    //                 '<td>' + '-' + '</td>' +
    //                 '<td>' + $('#name').val() + '</td>' +
    //                 '<td>' + $('#description').val() + '</td>' +
    //                 '<td>' + $('#telephone').val() + '</td>' +
    //                 '<td>' + $('#price').val() + '</td>' +
    //                 '<td>' + $('#rooms').val() + '</td>' +
    //                 '</tr>';
    //             $('#accTable tbody').append(markup);
    //         }
    //     )
    // );

    function button() {
        // update webpage:
        var markup = '<tr>' +
            '<td>' + '-' + '</td>' +
            '<td>' + $('#name').val() + '</td>' +
            '<td>' + $('#description').val() + '</td>' +
            '<td>' + $('#telephone').val() + '</td>' +
            '<td>' + $('#price').val() + '</td>' +
            '<td>' + $('#rooms').val() + '</td>' +
            '</tr>';
        $('#accTable tbody').append(markup);

        // update database:
        //
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

<button id='newAcc' onclick="button()">Save Accomodation to Server</button>

<br><br>

<table id="accTable">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Desc.</th>
        <th>Phone</th>
        <th>Price</th>
        <th>Rooms</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->description }}</td>
            <td>{{ $user->phonenumber }}</td>
            <td>{{ $user->price }}</td>
            <td>{{ $user->roomcount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection