@extends('layouts.masterLayout')

@section('title','Home')

@section('content')

    <div class="ht-link" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 ht-link_button">
                    <div class="row">
                        <div ><a href="#">About Us</a><span>|</span></div>
                        <div ><a href="#">Product Pric List</a><span>|</span></div>
                        <div ><a href="#">Contuct Us</a><span>|</span></div>
                        <div ><a href="#">Extra</a><span>|</span></div>
                    </div>
                </div>
                <div class="col-6 switch-button d-none d-md-block ">
                    <span class="switch-text">Bangla</span>
                    <label class="switch">
                        <input type="checkbox">
                        <div>
                            <span></span>
                        </div>
                    </label>
                    <span class="switch-text">English</span>
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
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MP List
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Message
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">LogIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('body')

@endsection()
