@extends('accomodations.layout')


@section('title', $user->name)

@section('header', $user->name.', ID. '.$user->id)

@section('content')
<h5>{{ $user->name }}</h5>
<h5>{{ $user->description }}</h5>
<h5>{{ $user->phonenumber }}</h5>
<h5>{{ $user->price }}</h5>
<h5>{{ $user->roomcount }}</h5>
@endsection

@section('footer')
<br><br>
<a href={{ "/accomodations/delete/" . $id }}>Delete this accomodation</a>
@endsection