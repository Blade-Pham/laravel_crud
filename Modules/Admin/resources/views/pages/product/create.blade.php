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
    <div class="container">
        <h3>Store Product</h3>
        <form method="POST" action="{{route('admin.product.store')}}" id="store-product">
            @csrf
            <div class="form-group">
                <label for="">Code (*)</label>
                <input type="text" class="form-control" id="" placeholder="Enter Code" name="code">
            </div>
            <div class="form-group">
                <label for="">Name (*)</label>
                <input type="text" class="form-control" id="" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" id="" placeholder="Enter Price" name="price">
            </div>
            <div class="form-group">
                <label for="">Type (*)</label>
                <select name="type"  class=" form-control" id="exampleSelectBorder">
                    <option value="" >Select Type</option>
                    <option value="type1">Type1</option>
                    <option value="type2">Type2</option>
                    <option value="type3">Type3</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection
@section("extra-js")
    {!! JsValidator::formRequest('Modules\Admin\Http\Requests\StoreProductRequest', "#store-product") !!}

@endsection
