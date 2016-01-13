@extends('layout.default')

@section('content')
    {!! form($form) !!}
@stop


@section('sidebar')
    @include('state._sidebar')
@stop