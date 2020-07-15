@extends('layouts.adminlte')

@section('title','Generic')

@section('content_header')
    <h1 class="pt-3" style="text-align: center">{{$item->name}}</h1>
@endsection


@section('content_body')
    <div class="container mr-element">
        <div class="row">
            <div class="col-sm-12 col-md-4 pt-5">
                <img class="mr-element_img" src="/storage/item/{{$item->image}}" alt="{{$item->name}}" height="300px" width="300px">
            </div>
            <div class="col-sm-12 col-md-8 pt-5">
                <form role="form" id="item-update" action="{{route('item.update',['item'=>$item->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputName">Item Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$item->name}}" id="exampleInputName" placeholder="{{$item->name}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputCode">Item Code</label>
                                    <input type="text" name="code" class="form-control" value="{{$item->code}}" id="exampleInputCode" placeholder="{{$item->code}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputDosage">Dosage</label>
                                    <input type="text" name="dosage" class="form-control" value="{{$item->dosage}}" id="exampleInputDosage" placeholder="{{$item->dosage}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputSize">Size</label>
                                    <input type="text" name="size" class="form-control" value="{{$item->size}}" id="exampleInputSize" placeholder="{{$item->size}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPrice">Price</label>
                                    <input type="text" name="price" class="form-control" value="{{$item->price}}" id="exampleInputPrice" placeholder="{{$item->price}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Item Type</label>
                                    <select class="form-control" name="item_type_id" value="{{$item->itemType->id}}" required>
                                        @foreach($itemType as $i)
                                            <option value="{{$i->id}}">{{$i->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Generic Name</label>
                                    <select class="form-control" name="generic_id" value="{{$item->generic->id}}" required>
                                        @foreach($generic as $i)
                                            <option value="{{$i->id}}">{{$i->name}}</option >
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group ">
                                    <label>Brand Name</label>
                                    <select class="form-control" name="brand_id" value="{{$item->brand->id}}" required>
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
                                    <textarea class="form-control" rows="3" placeholder="{{$item->description}}" name="description" required>{{$item->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose Photo</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col card-footer">
                <a class="btn btn-warning px-4" href="{{ route('item.show',['item'=>$item->id]) }}">
                    View
                </a>
            </div>
            <div class="col card-footer">
                <a class="btn btn-success px-4" onclick="event.preventDefault();document.getElementById('item-update').submit();">
                    Update
                </a>
            </div>
            <div class="col card-footer">
                <a class="btn btn-danger" href="{{ route('item.destroy',['item'=>$item->id]) }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('item-delete').submit();">
                    Delete
                </a>
                <form id="item-delete" action="{{ route('item.destroy',['item'=>$item->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
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
