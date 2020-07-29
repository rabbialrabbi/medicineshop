@extends('layouts.frontLayout')

@section('notice-active','active')

@section('body')
    <div class="container about-header">


        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h1 class="text-center">Notice</h1>
<!--                <hr class="about-uline">-->
                <p class="text-center pt-5">{{$noticeTop->notice}}</p>
            </div>
            <div class="col-sm-12 col-md-3 notice-history notice-history_text">
                <div class="card">
                    <div class="card-header notice-history_text-header ">
                        <h4 class="card-title text-center">HISTORY</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body notice-log">
                        @foreach($notice as $n)
                            <div>{{$n->created_at}}</div>
                            <p class="pt-1">{{substr($n->notice,0,100)}} </p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
