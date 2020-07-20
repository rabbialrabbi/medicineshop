@extends('layouts.adminlte')

@section('title','MR')

@section('content_header')
    <h1 style="text-align: center">MR Input Form</h1>
@endsection


@section('content_body')
    <div class="container pt-5">
        <div class="card card-warning">
            <div class="card-header">
            </div>
            <form role="form" action="{{route('mr.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <!--Input Id From user table-->
                        @if(is_null($inputUser))
                            <input type="hidden" name="user_id" value="none">
                        @else
                            <input type="hidden" name="user_id" class="form-control" value="{{$inputUser->user_id}}" id="exampleInputEmail1">
                        @endif

                        <div class="col-sm-6 col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">MR Name</label>
                                @if(is_null($inputUser))
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter MR Name">
                                    @else
                                    <input type="text" name="name" class="form-control" value="{{$inputUser->name}}" id="exampleInputEmail1">
                                @endif
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
                            <div id="address" class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="address1" class="form-control" id="exampleInputEmail1" placeholder="Enter Address1">
                                    </div>
                                    <div class="col-sm-1 align-self-center text-center">
                                        <i id="addition_address" class="fas fa-plus text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div id="contact" class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" name="contact1" class="form-control" id="exampleInputContact" placeholder="Enter Contact1">
                                    </div>
                                    <div class="col-sm-1 align-self-center text-center">
                                        <i id="addition_contact" class="fas fa-plus text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div id="email" class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        @if(is_null($inputUser))
                                            <input type="text" name="email1" class="form-control" id="exampleInputEmail" placeholder="Enter Email1">
                                        @else
                                            <input type="text" name="email1" class="form-control" value="{{$inputUser->email}}" >
                                        @endif

                                    </div>
                                    <div  class="col-sm-1 align-self-center">
                                        <i class="fas fa-plus text-success" id="addition_email"></i>
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
                                    <div class="col-sm-12">
                                        <input type="text" name="fax" class="form-control" id="exampleInputEmail1" placeholder="Enter Fax">
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">ADD</button>
                </div>
            </form>
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
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR: </strong> {{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="container">
        <h4 style="text-align: center; padding: 30px 0 10px 0">MR List</h4>
        <div class=" card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">MR List</h3>
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
                                <form id="delete-generic{{$g->id}}" action="{{ route('mr.destroy',['mr'=>$g->id]) }}" method="POST" style="display: none;">
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


