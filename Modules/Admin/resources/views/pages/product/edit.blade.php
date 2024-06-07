<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 09:20
 */
?>

@extends("admin::layouts.master")
@section("content")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-center align-items-center">
                    <h1>Edit Product</h1>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid px-5">
                <form method="POST" action="{{route('admin.product.update', $product->id)}}" id="store-product">
                    @csrf
                    <div class="form-group">
                        <label for="">Code (*)</label>
                        <input type="text" value="{{$product->code}}" class="form-control" id="" placeholder="Enter Code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="">Name (*)</label>
                        <input type="text" value="{{$product->name}}" class="form-control" id="" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="" value="{{$product->price}}" placeholder="Enter Price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="">Type (*)</label>
                        <select name="type"  class=" form-control" id="exampleSelectBorder">

                            <option @if($product->type == "type1") selected @endif value="type1">Đồ ăn nhanh</option>
                            <option @if($product->type == "type2") selected @endif value="type2">Nước uống</option>
                            <option @if($product->type == "type3") selected @endif value="type3">Món ăn nóng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Category (*)</label>
                        
                            
                            
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>

                </form>
            </div>
        </section>
    </div>

@endsection
@section("extra-js")
    {!! JsValidator::formRequest('Modules\Admin\Http\Requests\StoreProductRequest', "#store-product") !!}

@endsection
