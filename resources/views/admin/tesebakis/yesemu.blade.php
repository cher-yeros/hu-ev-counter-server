@extends('admin.layouts.app')

@section('content')
    @section('page-content')
        <div class="container">
{{--           <tesebakis type='yesemu'></tesebakis>--}}
{{--            {{dd(json_encode($yesemu))}}--}}
            <yesemu-list yesemu="{{ json_encode($yesemu)  }}"></yesemu-list>
{{--            <yesemu-list :yesemu="{{ Auth::user()->id }}"></yesemu-list>--}}

{{--            <table  class="table table-bordered table-hover">--}}
{{--                <thead class="thead-light">--}}
{{--                <tr>--}}
{{--                    <th>Preacher</th>--}}
{{--                    <th>Campus</th>--}}
{{--                    <th>Date</th>--}}
{{--                    <th>Number</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                @foreach($yesemu as $yesema)--}}
{{--                <tbody >--}}
{{--                <td>--}}
{{--                    <a class="dropdown-item" href="/sebaki-profile/Francisca Jenkins">--}}
{{--                        {{$yesema->sebakiId}}--}}
{{--            </a>--}}
{{--        </td>--}}
{{--        <td>{{$yesema->campusId}}</td>--}}
{{--        <td>{{$yesema->createdAt}}</td>--}}
{{--        <td>{{ $yesema->number }}</td>--}}
{{--        </tbody>--}}
{{--                @endforeach--}}
{{--    </table>--}}


{{--            @foreach($yesemu as $yesema)--}}
{{--                <li>{{$yesema->number}}</li>--}}
{{--            @endforeach--}}
        </div>
    @endsection
@endsection
