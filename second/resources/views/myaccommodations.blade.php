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
    <select class='select' id="sort-select" onchange="onChange()">
        <option value="id">Sort by ID</option>
        <option value="price">Sort by Price</option>
    </select>
</div>

<br>
<table id="table">
    <thead>
        <th id='id'>ID</th>
        <th>Acc. Name</th>
        <th>Description</th>
        <th id='price'>Price</th>
        <th>Rooms</th>
    </thead>
    <tbody>
        @foreach($accommodations as $accommodation)

        <tr>
            <td>{{ $accommodation->acc_id }}</td>
            <td>{{ $accommodation->acc_name }}</td>
            <td>{{ $accommodation->description }}</td>
            <td>{{ $accommodation->price }}</td>
            <td>{{ $accommodation->rooms }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<!-- <script src='{{ asset("js/tableTool.js") }}'></script> -->
@endsection