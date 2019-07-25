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
    <input type="date" id="startdate-input" onchange='dateDiff()'>
    <h4> to </h4>
    <input type="date" id="enddate-input" onchange='dateDiff()'>

    <button id="book" onclick="submit()">Book Now</button>

    <h4 style="margin-top: 25px">It will cost you: $<span id="current-cost">-</span></h4>

    {{csrf_field()}}
</div>

{{$user_id}}

<script>
    function dateDiff() {
        if ($('#startdate-input').val() !== '' && $('#enddate-input').val() !== '') {
            var start = new Date($('#startdate-input').val());
            var end = new Date($('#enddate-input').val());
            var days = Math.floor((Date.UTC(
                end.getFullYear(),
                end.getMonth(),
                end.getDate()
            ) - Date.UTC(
                start.getFullYear(),
                start.getMonth(),
                start.getDate()
            )) / (1000 * 60 * 60 * 24));

            $('#current-cost').text(days * {{$cost}})
        }
    }

    function submit() {
        $.ajax({
            type: 'POST',
            url: '/book',
            data: {
                _token: document.getElementsByName('_token')[0].value,  // write line using jQuery
                user_id: {{$user_id}},
                acc_id: {{$acc_id}},
                start_date: $('#startdate-input').val(),
                end_date: $('#enddate-input').val()
            },
            success: function(data) {
                // window.location.href = '/home';
            }
        });
    }
</script>
@endsection