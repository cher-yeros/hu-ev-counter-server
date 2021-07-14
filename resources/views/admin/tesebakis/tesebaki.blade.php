@extends('admin.layouts.app')

@section('content')
    @section('page-content')
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mt-1">
                    <div class="display-4 dash-board float-left">የተቀበሉ</div>
                    <form class="form-inline my-2 my-lg-0 float-right">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    {{-- <hr class="bg-light"> --}}
                </div>

                @if ($yetekebelu->count() > 0)
                    <table class="table table-bordered table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th>Sebaki</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($yetekebelu as $yetekebele)
                                <tr>
                                    <td scope="row">
                                        <a class="dropdown-item" href="/sebaki-profile/Francisca Jenkins">{{$yetekebele->sebaki->name}}</a>
                                    </td>
                                    <td scope="row">{{$yetekebele->name}}</td>
                                    <td scope="row">{{$yetekebele->phone}}</td>
                                    <td scope="row">{{$yetekebele->gender}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                @else
                    
                @endif
            </div>
        </div>
        
    @endsection
@endsection