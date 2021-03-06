@extends('layouts.adminlte')

@section('title','Item List')

@section('content_header')
    <h1 style="text-align: center">Item List</h1>
@endsection


@section('content')
    <div class=" card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">Item List</h3>
            <div class="card-tools">
                <form id="indexSearch" action="{{route('item.index')}}" method="get">
                    <div class="input-group input-group-sm">
                        <input type="text" name="key" class="form-control" placeholder="Search Item">
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
                    <th>Name</th>
                    <th>Code</th>
                    <th>Item</th>
                    <th>Generic</th>
                    <th>Brand</th>
                    <th>Size</th>
                    <th>Dosage</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $g)
                    <tr style="cursor: pointer" onclick="window.location='{{route('item.show',['item'=>$g->id])}}'">
                        <td><img src="/storage/item/{{$g->image}}" alt="{{$g->name}}" width="80px" height="80px"></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->name}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->code}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->itemType->name}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->generic->name}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->brand->name}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->size}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->dosage}}</div></td>
                        <td style="position: relative"> <div style="position: absolute;top: 50%;transform: translateY(-50%)">{{$g->price}}</div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection


