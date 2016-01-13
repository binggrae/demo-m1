@extends('layout.ajax')

@section('content')
    @include('good._index', compact('items', 'sort'))
@stop
