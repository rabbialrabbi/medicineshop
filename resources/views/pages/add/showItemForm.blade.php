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
            <form role="form" action="{{route('item.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Item Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Item Code</label>
                                <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Code">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dosage</label>
                                <input type="text" name="dosage" class="form-control" id="exampleInputEmail1" placeholder="Enter Dosage">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" name="size" class="form-control" id="exampleInputEmail1" placeholder="Enter Size">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Item Type</label>
                                <select class="form-control" name="item_type_id">
                                    @foreach($itemType as $i)
                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Generic Name</label>
                                <select class="form-control" name="generic_id">
                                    @foreach($generic as $i)
                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label>Brand Name</label>
                                <select class="form-control" name="brand_id">
                                    @foreach($brand as $i)
                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputFile">Choose Photo</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="showFileName(event)">
                                        <label id="inputPlaceholder" class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <h4 style="text-align: center; padding: 30px 0 10px 0">Item List</h4>
        <div class=" card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Item List</h3>
            </div>

            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($items as $g)
                        <tr onclick="window.location.href='{{route('item.show',['item'=>$g->id])}}'">
                            <td>
                            </td>
                            <td class="mailbox-star"></td>
                            <td class="mailbox-name"></td>
                            <td class="mailbox-date">{{$g->name}}</td>
                            <td class="mailbox-attachment">
                                <a class="" onclick="event.preventDefault(); document.getElementById('delete-generic{{$g->id}}').submit();">
                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                </a>
                                <form id="delete-generic{{$g->id}}" action="{{ route('item.destroy',['item'=>$g->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form></td>
                            <td class="mailbox-date text-center">

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function showFileName(event) {
            let selector = document.getElementById('inputPlaceholder')
            if(event.target.files.length > 0){
                let name = event.target.files[0].name
                selector.innerText= name;
            }
        }
    </script>

@endsection


