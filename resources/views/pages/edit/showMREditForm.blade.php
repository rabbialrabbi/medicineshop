@extends('layouts.adminlte')

@section('title','Generic')

@section('content_header')
    <h1 class="pt-3" style="text-align: center">{{$mr->name}}</h1>
@endsection


@section('content')
    <div class="container mr-element">
        <div class="row">
            <div class="col-sm-12 col-md-4 pt-5">
                <img class="mr-element_img" src="/storage/mrlist/{{$mr->image}}" alt="{{$mr->name}}" height="300px" width="300px">
            </div>
            <div class="col-sm-12 col-md-8 pt-5">
                <form role="form" action="{{route('mr.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MR Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter MR Name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MR Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="Enter MR Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="text" name="address1" class="form-control" id="exampleInputEmail1" placeholder="Enter Address1">
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
                                            <input type="text" name="contact1" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact1">
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
                                            <input type="text" name="email1" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
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
                                            <input type="text" name="fax" class="form-control" id="exampleInputEmail1" placeholder="Enter Fax">
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
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col card-footer">
                <!--                <button type="submit" class="btn btn-warning">ADD</button>-->
            </div>
            <div class="col card-footer">
                <button type="submit" class="btn btn-success px-4">Edit</button>
            </div>
            <div class="col card-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
@endsection
