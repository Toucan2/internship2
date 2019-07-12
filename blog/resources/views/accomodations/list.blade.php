@extends('accomodations.layout')


@section('title', 'Complete List')


@section('header', 'All Accomodations')


@section('content')
<input type="button" onCLick="location.href='http://127.0.0.1:8000/accomodations/create';" value="Create New" />
<br><br><br>

<ol>
@foreach ($users as $user)
<li>{{ $user->name }}</li>
<h5>{{ $user->id }}</h5>
<h5>{{ $user->description }}</h5>
<h5>{{ $user->phonenumber }}</h5>
<h5>{{ $user->price }}</h5>
<h5>{{ $user->roomcount }}</h5>
<br><br>
@endforeach
</ol>

<input type="button" onCLick="location.href='http://127.0.0.1:8000/accomodations/create';" value="Create New" />
<br><br><br>
@endsection