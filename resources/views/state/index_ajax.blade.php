@extends('layout.ajax')

@section('content')
    @include('state._index', compact('items', 'sort'))
@stop
