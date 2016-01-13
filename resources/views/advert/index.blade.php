@extends('layout.default')

@section('content')
    <div id="container_grid">
        @include('advert._index', compact('items', 'sort'))
    </div>
@stop


@section('sidebar')
    @include('advert._sidebar')
@stop