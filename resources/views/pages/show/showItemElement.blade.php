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
                <form role="form"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputName">Item Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$item->name}}" id="exampleInputName" placeholder="{{$item->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputCode">Item Code</label>
                                    <input type="text" name="code" class="form-control" value="{{$item->code}}" id="exampleInputCode" placeholder="{{$item->code}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputDosage">Dosage</label>
                                    <input type="text" name="dosage" class="form-control" value="{{$item->dosage}}" id="exampleInputDosage" placeholder="{{$item->dosage}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputSize">Size</label>
                                    <input type="text" name="size" class="form-control" value="{{$item->size}}" id="exampleInputSize" placeholder="{{$item->size}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPrice">Price</label>
                                    <input type="text" name="price" class="form-control" value="{{$item->price}}" id="exampleInputPrice" placeholder="{{$item->price}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Item Type</label>
                                    <input type="text"  class="form-control" value="{{$item->itemType->name}}" id="exampleInputPrice" placeholder="{{$item->itemType->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Generic Name</label>
                                    <input type="text" name="price" class="form-control" value="{{$item->generic->name}}" id="exampleInputPrice" placeholder="{{$item->generic->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group ">
                                    <label>Brand Name</label>
                                    <input type="text" name="price" class="form-control" value="{{$item->brand->name}}" id="exampleInputPrice" placeholder="{{$item->brand->name}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" value="{{$item->description}}" placeholder="{{$item->description}}" name="description" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col card-footer">
                <a class="btn btn-warning px-4" href="{{ route('item.index') }}">
                    Back
                </a>
            </div>
            <div class="col card-footer">
                <a class="btn btn-success px-4" href="{{ route('item.edit',['item'=>$item->id]) }}">
                    Edit
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
    </div>

@endsection
