@extends('layout.ajax')

@section('content')
    @include('order._index', compact('items', 'sort'))
@stop
