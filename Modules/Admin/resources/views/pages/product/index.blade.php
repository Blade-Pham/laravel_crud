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
        <h3>List Product</h3>
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product</a>
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->type}}</td>
                        <td>
                            <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-info">View</a></td>
                        <td>
                            <a class="btn btn-danger" href="{{route('admin.product.delete', $product->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
