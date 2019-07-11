@extends('accomodations.layout')


@section('title', $user->name)


@section('header', $user->name.', ID. '.$user->id)


@section('content')

<li>{{ $user->name }}</li>
<h5>{{ $user->description }}</h5>
<h5>{{ $user->phonenumber }}</h5>
<h5>{{ $user->price }}</h5>
<h5>{{ $user->roomcount }}</h5>

@endsection