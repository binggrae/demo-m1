@extends('layout.default')

@section('content')
    <div id="container_grid">
        @include('order._index', compact('items', 'sort'))
    </div>
@stop


@section('sidebar')
    @include('order._sidebar')
@stop