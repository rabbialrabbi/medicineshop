@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}

        <nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
        {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

            {{-- Navbar left links --}}
            <ul class="navbar-nav">
                {{-- Left sidebar toggler link --}}
                @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

                {{-- Configured left links --}}
                @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

                {{-- Custom left links --}}
                @yield('content_top_nav_left')
            </ul>

            {{-- Navbar right links --}}
            <ul class="navbar-nav ml-auto">
                {{-- Custom right links --}}
                @yield('content_top_nav_right')

                {{-- Configured right links --}}
                @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

                {{-- User menu link --}}
                @if(Auth::user())
                    @if(config('adminlte.usermenu_enabled'))
                        @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
                    @else
                        @include('adminlte::partials.navbar.menu-item-logout-link')
                    @endif
                @endif

                {{-- Right sidebar toggler link --}}
                @if(config('adminlte.right_sidebar'))
                    @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
                @endif
            </ul>

        </nav>


        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop

