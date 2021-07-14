@extends('admin.layouts.app')

@section('content')
    @section('page-content')
        <activity-log :activities="{{$activities}}"></activity-log>           
    @endsection
@endsection

