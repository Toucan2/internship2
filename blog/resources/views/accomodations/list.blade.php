@extends('accomodations.layout')


@section('title', 'Complete List')


@section('header', 'All Accomodations')


@section('content')
<input type="button" onCLick="location.href='http://127.0.0.1:8000/accomodations/create';" value="Create New" />
<br><br><br>

<ol>
@foreach ($users as $user)
<li>Name: {{ $user->name }}</li>
<h5>ID: {{ $user->id }}</h5>
<h5>Desc.: {{ $user->description }}</h5>
<h5>Phone: {{ $user->phonenumber }}</h5>
<h5>Price: {{ $user->price }}</h5>
<h5>Rooms: {{ $user->roomcount }}</h5>
<br><br>
@endforeach
</ol>

<input type="button" onCLick="location.href='http://127.0.0.1:8000/accomodations/create';" value="Create New" />
<br><br><br>
@endsection