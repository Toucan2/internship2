@extends('accomodations.layout')


@section('title', 'New Accomodation')


@section('header', 'Create New Accomodation')


@section('content')

<form method='POST' action='/api/accomodations'>
    {{ csrf_field() }}

    <div>
        <input type="text" name='name' placeholder='Acc. Name'>
    </div>

    <div>
        <!-- <input type="text" name='description' placeholder='Acc. Description'> -->
        <textarea name="description" placeholder="Acc. Description" cols="30" rows="10"></textarea>
    </div>

    <div>
        <input type="text" name='telephone' placeholder='Tel.'>
    </div>

    <div>
        <input type="number" name='price' step=0.01 placeholder='Price'>
    </div>

    <div>
        <input type="number" name='rooms' placeholder='Room Count'>
    </div>

    <button type="submit">Save Accomodation to Server</button>
</form>

@endsection