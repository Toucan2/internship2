@extends('layouts.app')

@section('head')
<style>
    button {
        margin-top: 25px;
        width: 20%;
    }

    button:hover {
        font-weight: bolder;
    }

    .header {
        text-align: center;
        font-size: 40px;
        padding: 25px;
        font-weight: lighter;
    }

    .form {
        display: flex;
        flex-flow: column wrap;
        align-items: center;
    }
</style>
@endsection

@section('content')
<div id="title" class="header">
    Booking Accommodation #{{$acc_id}}
</div>

<div class="form">
    <h4>From </h4>
    <input type="date" id="startdate-input">
    <h4> to </h4>
    <input type="date" id="enddate-input">

    <button id="book" onclick="submit()">Book Now</button>
    {{csrf_field()}}
</div>

{{$user_id}}

<script>
    function submit() {
        $.ajax({
            type: 'POST',
            url: '/book',
            data: {
                _token: document.getElementsByName('_token')[0].value,
                user_id: {{$user_id}},
                acc_id: {{$acc_id}},
                start_date: $('#startdate-input').val(),
                end_date: $('#enddate-input').val()
            },
            success: function(data) {
                console.log('success: ' + data.success);
            }
        });
    }
</script>
@endsection