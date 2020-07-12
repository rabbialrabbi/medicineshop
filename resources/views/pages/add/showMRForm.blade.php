@extends('layouts.adminlte')

@section('title','Generic')

@section('content_header')
    <h1 style="text-align: center">Item Input Form</h1>
@endsection


@section('content')
    <div class="container pt-5">
        <div class="card card-warning">
            <div class="card-header">
            </div>
            <form role="form" action="{{route('add.item')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">MR Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">MR Code</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                                    </div>
                                    <div class="col-sm-1 align-self-center text-center">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                                    </div>
                                    <div class="col-sm-1 align-self-center text-center">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                                    </div>
                                    <div class="col-sm-1 align-self-center">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fax</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                                    </div>
                                    <div class="col-sm-1 align-self-center text-center">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <div class="form-group">
                                <label for="exampleInputFile">Choose Photo</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <h4 style="text-align: center; padding: 30px 0 10px 0">Item List</h4>
        <div class=" card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Item List</h3>
            </div>

            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($items as $g)
                        <tr>
                            <td>
                            </td>
                            <td class="mailbox-star"></td>
                            <td class="mailbox-name"></td>
                            <td class="mailbox-date">{{$g->name}}</td>
                            <td class="mailbox-attachment">
                                <a class="" onclick="event.preventDefault(); document.getElementById('delete-generic{{$g->id}}').submit();">
                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                </a>
                                <form id="delete-generic{{$g->id}}" action="{{ route('destroy.item',['item'=>$g->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form></td>
                            <td class="mailbox-date text-center">

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


