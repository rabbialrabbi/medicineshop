@extends('layouts.adminlte')

@section('title','MR Show')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                {{--<div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>--}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('content_body')
    {{--    <invoice-component></invoice-component>--}}
    <invoice-component :order="{{json_encode($order)}}"></invoice-component>
@endsection

@section('js')
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
@endsection
