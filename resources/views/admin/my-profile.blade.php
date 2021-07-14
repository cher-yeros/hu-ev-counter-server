@extends('admin.layouts.app')

@section('content')
    @section('page-content')
        <br>
        <my-profile :user="{{$user}}"></my-profile>
    @endsection
@endsection