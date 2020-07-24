@extends('layouts.adminlte')

@section('title','MR List')

@section('content_header')
    <h1 style="text-align: center">Order List</h1>
@endsection


@section('content')
    <div class=" card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">Order List</h3>
            <div class="card-tools">
                <form id="indexSearch" action="{{route('mr.index')}}" method="get">
                    <div class="input-group input-group-sm">
                        <input type="text" name="key" class="form-control" placeholder="Search MR">
                        <div class="input-group-append" onclick="event.preventDefault(); document.getElementById('indexSearch').submit();">
                            <div class="btn btn-primary">
                                <i class="fas fa-search" ></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Order Name</th>
                    <th>MR</th>
                    <th>Total item</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $g)
                    <tr onclick="window.location='{{route('order.show',['order'=>$g->id])}}'">
                        <td></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->order_name}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->user->name}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->order_details->count()}}</div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection


