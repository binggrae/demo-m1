@extends('layout.default')

@section('content')
    <div id="container_grid">
        @include('state._index', compact('items', 'sort'))
    </div>
@stop


@section('sidebar')
    @include('state._sidebar')
@stop