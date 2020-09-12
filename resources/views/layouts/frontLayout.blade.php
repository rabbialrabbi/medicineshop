@extends('layouts.masterLayout')

@section('title','Home')

@yield('nav-active')

@section('content')

    <div class="ht-link" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 ht-link_button">
                    <div class="row">
                        <div ><a href="#">About Us</a><span>|</span></div>
                        <div ><a href="#">Product Price List</a><span>|</span></div>
                        <div ><a href="#">Contact Us</a><span>|</span></div>
                        <div ><a href="#">Extra</a><span>|</span></div>
                        <div ><a href="/admin">Dashboard</a><span>|</span></div>
                    </div>
                </div>
                <div class="col-6 switch-button d-none d-md-block ">
                    <span class="switch-text">English</span>
                    <label class="switch">
                        @if(session()->get('locale') == 'bd')
                        <input type="checkbox" onclick="window.location.href='{{route("home.view",["locale"=>"en"])}}'" checked>
                            @else
                            <input type="checkbox" onclick="window.location.href='{{route("home.view",["locale"=>"bd"])}}'" >
                        @endif
                        <div>
                            <span></span>
                        </div>
                    </label>
                    <span class="switch-text">বাংলা</span>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light header-nav">
        <a class="d-block d-lg-none nav-logo" href="#">MedicineShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <ul class="nav nav-tabs nav-icon-cont">
                    <div class="nav-item nav-icon">
                        <a href="{{route('home.view')}}"><img src="{{asset('images/logotran.png')}}" alt="LOGO"></a>
                    </div>

                    <li class="nav-item">
                        <a class="nav-link @yield('home-active')" href="{{route('home.view')}}">{{__('front.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('about-active')" href="{{route('home.about')}}">{{__('front.about_us')}}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @yield('product-active')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('front.product')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($itemType as $i)
                                <a class="dropdown-item" href="{{route('front.filter',['itemType'=>$i->id])}}">{{$i->name}}</a>
                            @endforeach

                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" href="{{route('front.filter',['itemType'=>''])}}">All</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('mr-active')" href="{{route('home.mr')}}">{{__('front.mr_list')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @yield('message-active')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('front.message')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('message.chairman')}}">Chairman message</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('message.md')}}">MD message</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('message.ed')}}">ED message</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('notice-active')" href="{{route('notice.index')}}">{{__('front.notice')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('contact-active')" href="{{route('home.contact')}}">{{__('front.contact')}}</a>
                    </li>
                    @if(Auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{__('front.log_out')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                        @else()
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">{{__('front.log_in')}}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('promo')

    @yield('body')

@endsection()
