@extends('layouts.adminlte')

@section('title','Generic')

@section('content_header')
    <h1 style="text-align: center">Generic Input Form</h1>
@endsection


@section('content')
    <div class="container pt-5">
        <div class="card card-warning">
            <div class="card-header">
            </div>
            <form role="form" action="{{route('generic.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Generic Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Generic Name">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <h4 style="text-align: center; padding: 30px 0 10px 0">Generic List</h4>
        <div class=" card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Generic List</h3>

<!--                Search Generic form llist-->

{{--                <div class="card-tools">--}}
{{--                    <div class="input-group input-group-sm">--}}
{{--                        <input type="text" class="form-control" placeholder="Search Generic">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <div class="btn btn-primary">--}}
{{--                                <i class="fas fa-search"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
                                    <form id="delete-generic{{$g->id}}" action="{{ route('generic.destroy',['generic'=>$g->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form></td>
                                <td class="mailbox-date text-center">

                                </td>
                            </tr>
                            @endforeach

                        <tr>
                            <td>
                            </td>
                            <td class="mailbox-star"></td>
                            <td class="mailbox-name"></td>
                            <td class="mailbox-date">Alexander Pierce</td>
                            <td class="mailbox-attachment">5 mins ago</td>
                            <td class="mailbox-date">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check2">
                                    <label for="check2"></label>
                                </div>
                            </td>
                            <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                            <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                            <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                            </td>
                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                            <td class="mailbox-date">28 mins ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check3">
                                    <label for="check3"></label>
                                </div>
                            </td>
                            <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                            <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                            <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                            </td>
                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                            <td class="mailbox-date">11 hours ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check4">
                                    <label for="check4"></label>
                                </div>
                            </td>
                            <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                            <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                            <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">15 hours ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check5">
                                    <label for="check5"></label>
                                </div>
                            </td>
                            <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                            <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                            <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                            </td>
                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                            <td class="mailbox-date">Yesterday</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


