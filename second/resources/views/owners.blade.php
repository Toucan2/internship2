@extends('layouts.app')

@section('head')
<style>
    div.filter {
        margin: auto;
        width: 10%;
    }
</style>
@endsection

@section('content')
<div class="filter">
    <select id="sort-select" onchange="onChange()">
        <option value="id">Sort by ID</option>
        <option value="price">Sort by Price</option>
        <option value="accommodations">Sort by Accommodations</option>
    </select>
</div>

<br>
<table id='table'>
    <thead>
        <tr>
            <th id='id'>Owner ID</th>
            <th>Name</th>
            <th>Email</th>
            <th id='accommodations'>Accommodations</th>
            <th id='price'>Income</th>
        </tr>
    </thead>
    <tbody>
        @foreach($owners as $owner)

        <tr>
            <td>{{ $owner->id }}</td>
            <td>{{ $owner->name }}</td>
            <td>{{ $owner->email }}</td>
            <td>{{ $owner->total }}</td>
            <td>{{ $owner->income }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<script src='{{ asset("js/tabletool.js") }}'></script>

@endsection