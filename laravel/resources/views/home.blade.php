@extends('layouts.admin')

@section('content')
@foreach($companies as $key=>$val)
    <a href="{{ url('selection') }}/{{$key}}" class="btn btn-lg btn-outline-info">{{$val}}</a>
@endforeach
@endsection
