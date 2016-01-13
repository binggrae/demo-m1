@extends('layout.default')

@section('content')
    <div id="container_grid">
        @include('good._index', compact('items', 'sort'))
    </div>
@stop


@section('sidebar')
    @include('good._sidebar')
@stop