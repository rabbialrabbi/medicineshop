@extends('layouts.frontWithPromo')
@section('mr-active','active')
@section('body')
    <div class=" card card-warning card-outline">
        <div class=" card-header">
            <h2 class=" container card-title text-center p-5">MR List</h2>
            <div class=" container card-tools">
                <form id="indexSearch" action="{{route('home.mr')}}" method="get">
                    <div class="input-group input-group-sm">
                        <input type="text" name="key" class="form-control" placeholder="Search MR">
                        <div class="input-group-append" onclick="event.preventDefault(); document.getElementById('indexSearch').submit();">
                            <div class="btn btn-primary">
                                <i class="fas fa-search px-3" ></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container table-responsive mailbox-messages pt-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Fax</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $g)
                    <tr>
                        <td class="mr-row_img" style="position: relative; width: 12%"><img src="/storage/mrlist/{{$g->image}}" alt="{{$g->name}}" width="80px" height="80px"></td>
                        <td class="mr-row_name" style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->name}}</div></td>
                        <td class="mr-row_code" style="position: relative; width: 8%"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->code}}</div></td>
                        <td class="mr-row_address" style="position: relative; width: 17%"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->address1}}</div></td>
                        <td class="mr-row_contact" style="position: relative; width: 12%"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->contact1}}</div></td>
                        <td class="mr-row_email" style="position: relative; width: 17%"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->email1}}</div></td>
                        <td class="mr-row_fax" style="position: relative; width: 12%"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->fax}}</div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
