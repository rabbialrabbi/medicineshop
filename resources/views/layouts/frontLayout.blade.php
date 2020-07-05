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

{{--    <div class="ht-nav">--}}
{{--        <ul>--}}
{{--            <li class="ht-nav_navbar"><a href="#">Home</a></li>--}}
{{--            <li class="ht-nav_navbar"><a href="#">About Us</a></li>--}}
{{--            <li class="ht-nav_navbar"><a href="/">Product</a>--}}
{{--                <ul>--}}
{{--                    <li><a href="/productlist">Product</a></li>--}}
{{--                    <li><a href="/productlist">Product</a></li>--}}
{{--                    <li><a href="/productlist">Product</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="ht-nav_navbar"><a href="/">MP List</a>--}}
{{--                <ul>--}}
{{--                    <li><a href="/productlist">Product</a></li>--}}
{{--                    <li><a href="/productlist">Product</a></li>--}}
{{--                    <li><a href="/productlist">Product</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="ht-nav_navbar"><a href="/">Message</a>--}}
{{--                <ul>--}}
{{--                    <li><a href="/productlist">Chairman</a></li>--}}
{{--                    <li><a href="/productlist">MD</a></li>--}}
{{--                    <li><a href="/productlist">ED</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="ht-nav_navbar"><a href="#">Notice</a></li>--}}
{{--            <li class="ht-nav_navbar"><a href="#">Contact</a></li>--}}
{{--            <li class="ht-nav_navbar"><a href="#">LogIn</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Active</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


{{--    <ul class="nav nav-tabs">--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link active" href="#">Active</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
{{--            <div class="dropdown-menu">--}}
{{--                <a class="dropdown-item" href="#">Action</a>--}}
{{--                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">Separated link</a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="#">Link</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link disabled" href="#">Disabled</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
@endsection()
