@extends('layout.ajax')

@section('content')
    @include('advert._index', compact('items', 'sort'))
@stop
