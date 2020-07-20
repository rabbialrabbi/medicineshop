@extends('layouts.adminlte')

@section('title','MR Edit')

@section('content_header')
    <h1 class="pt-3" style="text-align: center">{{$mr->name}}</h1>
@endsection


@section('content_body')
    <div class="container mr-element">
        <div class="row">
            <div class="col-sm-12 col-md-4 pt-5">
                <img class="mr-element_img" src="/storage/mrlist/{{$mr->image}}" alt="{{$mr->name}}" height="300px" width="300px">
            </div>
            <div class="col-sm-12 col-md-8 pt-5">
                <form id="mr-update" role="form" action="{{route('mr.update',['mr'=>$mr->id])}}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">

                            <!--Input Id From user table-->
                            <input type="hidden" name="user_id" class="form-control" value="{{$mr->user_id}}">

                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputName">MR Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{$mr->name}}" placeholder="{{$mr->name}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputCode">MR Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputCode" value="{{$mr->code}}" placeholder="{{$mr->code}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div id="address" class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <div class="row" >
                                        <div class="col-sm-10">
                                            <input type="text" name="address1" class="form-control" id="exampleInputEmail1" value="{{$mr->address1}}" placeholder="{{$mr->address1}}">
                                        </div>
                                        <div class="col-sm-1 align-self-center text-center">
                                            <i id="addition_address" class="fas fa-plus text-success"></i>
                                        </div>
                                    </div>

                                    @if(!is_null($mr->address2))
                                        <div class="row pt-3" >
                                            <div class="col-sm-10">
                                                <input type="text" name="address2" class="form-control" value="{{$mr->address2}}" placeholder="{{$mr->address2}}">
                                            </div>
                                        </div>
                                        @endif

                                    @if(!is_null($mr->address3))
                                        <div class="row pt-3" >
                                            <div class="col-sm-10">
                                                <input type="text" name="address3" class="form-control" value="{{$mr->address3}}" placeholder="{{$mr->address3}}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div id="email" class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="text" name="email1" class="form-control" id="exampleInputEmail" value="{{$mr->email1}}" placeholder="{{$mr->email1}}">
                                        </div>
                                        <div  class="col-sm-1 align-self-center">
                                            <i class="fas fa-plus text-success" id="addition_email"></i>
                                        </div>
                                    </div>

                                    @if(!is_null($mr->email2))
                                        <div class="row pt-3">
                                            <div class="col-sm-10">
                                                <input type="text" name="email2" value="{{$mr->email2}}" class="form-control" placeholder="{{$mr->email2}}">
                                            </div>
                                        </div>
                                        @endif

                                    @if(!is_null($mr->email3))
                                        <div class="row pt-3">
                                            <div class="col-sm-10">
                                                <input type="text" name="email3" value="{{$mr->email3}}" class="form-control" placeholder="{{$mr->email3}}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div id="contact" class="form-group">
                                    <label for="exampleInputContact">Contact</label>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="text" name="contact1" class="form-control" id="exampleInputContact" value="{{$mr->contact1}}" placeholder="{{$mr->contact1}}">
                                        </div>
                                        <div class="col-sm-1 align-self-center text-center">
                                            <i id="addition_contact" class="fas fa-plus text-success"></i>
                                        </div>
                                    </div>

                                    @if(!is_null($mr->contact2))
                                        <div class="row pt-3">
                                            <div class="col-sm-10">
                                                <input type="text" name="contact2" value="{{$mr->contact2}}" class="form-control" placeholder="{{$mr->contact2}}">
                                            </div>
                                        </div>
                                    @endif

                                    @if(!is_null($mr->contact3))
                                        <div class="row pt-3">
                                            <div class="col-sm-10">
                                                <input type="text" name="contact3" value="{{$mr->contact3}}" class="form-control" placeholder="{{$mr->contact3}}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFax">Fax</label>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="text" name="fax" class="form-control" id="exampleInputFax" value="{{$mr->fax}}" placeholder="{{$mr->fax}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
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
                <a href="/mr/{{$mr->id}}" class="btn btn-warning">View</a>
            </div>
            <div class="col card-footer">
                <a class="btn btn-success px-4"
                   onclick="event.preventDefault();
                                                     document.getElementById('mr-update').submit();">
                    Update
                </a>
            </div>
            <div class="col card-footer">
                <a class="btn btn-danger" href="{{ route('mr.destroy',['mr'=>$mr->id]) }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('mr-delete').submit();">
                    Delete
                </a>
                <form id="mr-delete" action="{{ route('mr.destroy',['mr'=>$mr->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-4" role="alert">
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{$error}}</li>
                    </ul>
                @endforeach
            </div>
        @endif

    </div>
@endsection
@section('js')
{{--    <script src="/js/app.js"></script>--}}
    <script >
        $(document).ready(function(){

            let address_i = 1;
            let contact_i = 1;
            let email_i = 1;
            // add additional work and job field
            $("#addition_address").click(function () {
                address_i++
                if(address_i <=3){
                    $("#address").append(`<div class="row pt-3" >
                                        <div class="col-sm-10">
                                            <input type="text" name="address${address_i}" class="form-control" placeholder="Enter Another address">
                                        </div>
                                    </div>`);
                }
            });

            $("#addition_email").click(function () {
                email_i++
                if(email_i<=3){
                    $("#email").append(`<div class="row pt-3" >
                                        <div class="col-sm-10">
                                            <input type="text" name="email${email_i}" class="form-control" placeholder="Enter Another Email">
                                        </div>
                                    </div>`);
                }

            });

            $("#addition_contact").click(function () {
                contact_i++
                if(contact_i<=3){
                    $("#contact").append(`<div class="row pt-3" >
                                        <div class="col-sm-10">
                                            <input type="text" name="email${contact_i}" class="form-control" placeholder="Enter Another Contact">
                                        </div>
                                    </div>`);
                }

            });

        });
    </script>
@endsection
