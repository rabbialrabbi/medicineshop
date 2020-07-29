@extends('layouts.adminlte')

@section('title','Item')

@section('content_header')
    <h1 style="text-align: center">Item Input Form</h1>
@endsection


@section('content')
    <div class="container pt-5">
        <div class="card card-warning">
            <div class="card-header">
            </div>
            <form role="form" action="{{route('notice.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Notice</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Notice" name="notice"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Publish</button>
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

@endsection



