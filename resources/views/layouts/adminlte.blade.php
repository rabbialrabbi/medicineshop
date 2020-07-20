@extends('adminlte::page')
@section('adminlte_css')
    <link rel="stylesheet" href="{{asset('/css/adminlte/custom.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content_top_nav_left')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home.view')}}" class="nav-link">Home</a>
    </li>
@endsection

@section('content_top_nav_right')

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">{{$users->count()}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            @foreach($users as $u)
                <div href="#" class="dropdown-item">

                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('images/user.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{$u->name}}
                            </h3>
                            <p class="text-sm">Please Accept my ...</p>
                            <p class="text-sm text-muted">
                                <i class="fas fa-user-plus" onclick="event.preventDefault();document.getElementById('include_user{{$u->id}}').submit();"></i>
                                <i class="fas fa-trash-alt"></i>
                            </p>
                            <form id="include_user{{$u->id}}" action="{{ route('mr.create') }}" method="GET" style="display: none;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$u->id}}">
                                <input type="hidden" name="name" value="{{$u->name}}">
                                <input type="hidden" name="email" value="{{$u->email}}">
                            </form>
                        </div>
                    </div>
                    <!-- Message End -->
                </div>
                <div class="dropdown-divider"></div>
            @endforeach


            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="images/user.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            John Pierce
                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="images/user.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Nora Silvester
                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>

@endsection

@section('content')
    <div id="app">
        @yield('content_body')
    </div>

    @endsection

