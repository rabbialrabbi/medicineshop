<?php $title = 'generic'?>
@extends('layouts.adminlte')

@section('title',ucfirst($title))

@section('content_header')
    <h1 style="text-align: center">{{ucfirst($title)}} Input Form</h1>
@endsection


@section('content')
    <div class="container pt-5">
        <div class="card card-warning">
            <div class="card-header">
            </div>
            <form role="form" action="{{route($title.'.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ucfirst($title)}} Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="{{'Enter '.ucfirst($title).' Name'}}">
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
    </div>

    <div class="container">
        <h4 style="text-align: center; padding: 30px 0 10px 0">{{ucfirst($title)}} List</h4>
        <div class=" card card-warning card-outline ">
            <div class="card-header">
<!--                <h3 class="card-title">{{$title}} List</h3>-->

                <div class="card-tools pr-5">
                    <a href="{{route('generic.pdf')}}">View</a>
                </div>
            </div>

            <div class="table-responsive mailbox-messages">
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>{{ucfirst($title)}} Name</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $g)
                            <tr>
                                <td>
                                </td>
                                <td class="mailbox-star"></td>
                                <td class="mailbox-name"></td>
                                <td id="table-show_name" class="mailbox-date">
                                    <div id="table-show_name-data{{$g->id}}">{{$g->name}}</div>
                                    <form id="table-show_name-form{{$g->id}}" action="{{route($title.'.update',[$title=>$g->id])}}" method="post" style="display: none">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="name" class="form-control" value="{{$g->name}}" placeholder="{{$g->name}}">
                                            <div class="input-group-append" onclick="event.preventDefault(); document.getElementById('table-show_name-form{{$g->id}}').submit();">
                                                <div class="btn btn-primary">
                                                    <i class="fas fa-plus" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="mailbox-attachment">
                                    <a class="" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('status-{{$g->id}}').submit();">
                                        @if($g->status == 'Inactive')
                                            <span class="badge-btn" style="background-color: lightgrey" >{{$g->status}}</span>
                                        @else
                                            <span class="badge-btn bg-success px-3" >{{$g->status}}</span>
                                        @endif
                                    </a>
                                    <form id="status-{{$g->id}}" action="{{ route($title.'.update',[$title=>$g->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Inactive">
                                    </form>

                                </td>
                                <td class="mailbox-date text-center table-action">
                                    <a class="" onclick="event.preventDefault(); document.getElementById('delete-item{{$g->id}}').submit();">
                                        <i class="fa fa-times table-action_delete" aria-hidden="true" ></i>
                                    </a>
                                    <form id="delete-item{{$g->id}}" action="{{ route($title.'.destroy',[$title=>$g->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a class="pl-3">
                                        <i id="table-action_edit{{$g->id}}" class="fas fa-edit table-action_edit" key="{{$g->id}}"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('adminlte_js')
{{--    <script src="{{asset('js/app.js')}}"></script>--}}
<script>

    @foreach($items as $i)
    $('#table-action_edit{{$i->id}}').click(function () {
        $('#table-show_name-data{{$i->id}}').toggle()
        $('#table-show_name-form{{$i->id}}').toggle()
    })
@endforeach

</script>
@endsection



