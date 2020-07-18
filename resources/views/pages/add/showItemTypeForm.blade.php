@extends('layouts.adminlte')

@section('title','ItemType')

@section('content_header')
    <h1 style="text-align: center">Item Type Input Form</h1>
@endsection


@section('content')
    <div class="container pt-5">
        <div class="card card-warning">
            <div class="card-header">
            </div>
            <form role="form" action="{{route('itemType.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Type Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Type Name">
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
        <h4 style="text-align: center; padding: 30px 0 10px 0">Item Type List</h4>
        <div class=" card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Item Type List</h3>
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
                                <a class="" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('status-{{$g->id}}').submit();">
                                    @if($g->status == 'Inactive')
                                        <span class="badge-btn" style="background-color: lightgrey" >{{$g->status}}</span>
                                    @else
                                        <span class="badge-btn bg-success" >{{$g->status}}</span>
                                    @endif

                                </a>
                                <form id="status-{{$g->id}}" action="{{ route('itemType.update',['itemType'=>$g->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Inactive">
                                </form>

                            </td>
                            <td class="mailbox-date text-center">
                                <a class="" onclick="event.preventDefault(); document.getElementById('delete-generic{{$g->id}}').submit();">
                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                </a>
                                <form id="delete-generic{{$g->id}}" action="{{ route('itemType.destroy',['itemType'=>$g->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


