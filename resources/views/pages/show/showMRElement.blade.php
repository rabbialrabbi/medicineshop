@extends('layouts.adminlte')

@section('title','MR Show')

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
                <form id="mr-update" role="form" action="/mr" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputName">MR Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{$mr->name}}" placeholder="{{$mr->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputCode">MR Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputCode" value="{{$mr->code}}" placeholder="{{$mr->code}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div id="address" class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <div class="row" >
                                        <div class="col-sm-12">
                                            <input type="text" name="address1" class="form-control" id="exampleInputEmail1" value="{{$mr->address1}}" placeholder="{{$mr->address1}}" disabled>
                                        </div>
                                    </div>

                                    @if(!is_null($mr->address2))
                                        <div class="row pt-3" >
                                            <div class="col-sm-12">
                                                <input type="text" name="address2" class="form-control" value="{{$mr->address2}}" placeholder="{{$mr->address2}}" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!is_null($mr->address3))
                                        <div class="row pt-3" >
                                            <div class="col-sm-12">
                                                <input type="text" name="address3" class="form-control" value="{{$mr->address3}}" placeholder="{{$mr->address3}}" disabled>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div id="email" class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" name="email1" class="form-control" id="exampleInputEmail" value="{{$mr->email1}}" placeholder="{{$mr->email1}}" disabled>
                                        </div>
                                    </div>

                                    @if(!is_null($mr->email2))
                                        <div class="row pt-3">
                                            <div class="col-sm-12">
                                                <input type="text" name="email2" value="{{$mr->email2}}" class="form-control" placeholder="{{$mr->email2}}" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!is_null($mr->email3))
                                        <div class="row pt-3">
                                            <div class="col-sm-12">
                                                <input type="text" name="email3" value="{{$mr->email3}}" class="form-control" placeholder="{{$mr->email3}}" disabled>
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
                                        <div class="col-sm-12">
                                            <input type="text" name="contact1" class="form-control" id="exampleInputContact" value="{{$mr->contact1}}" placeholder="{{$mr->contact1}}" disabled>
                                        </div>
                                    </div>

                                    @if(!is_null($mr->contact2))
                                        <div class="row pt-3">
                                            <div class="col-sm-10">
                                                <input type="text" name="contact2" value="{{$mr->contact2}}" class="form-control" placeholder="{{$mr->contact2}}" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!is_null($mr->contact3))
                                        <div class="row pt-3">
                                            <div class="col-sm-10">
                                                <input type="text" name="contact3" value="{{$mr->contact3}}" class="form-control" placeholder="{{$mr->contact3}}" disabled>
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
                                            <input type="text" name="fax" class="form-control" id="exampleInputFax" value="{{$mr->fax}}" placeholder="{{$mr->fax}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col card-footer">
                <a class="btn btn-warning px-4" href="{{ route('mr.index') }}">
                    Back
                </a>
            </div>
            <div class="col card-footer">
                <a class="btn btn-success px-4" href="{{ route('mr.edit',['mr'=>$mr->id]) }}">
                    Edit
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
    </div>

@endsection
