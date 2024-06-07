<?php

?>

@extends("admin::layouts.master")
@section("content")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-center align-items-center">
                    <h1>List Product</h1>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success text-center" id="success-alert">
                 {{ session('success') }}
                </div>
            @endif

        </section>
        <div class="d-flex justify-content-end px-5 pb-3">
            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product</a>
        </div>
        <section>
            <div class="container-fluid px-5">
                <form action="" method="get">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" value="{{request()->get('name')}}">
                    <label for="">Code</label>
                    <input type="text" name="code" id="">
                    <label for="">Admin</label>
                    <select name="admin_id" id="" class="form-control">
                        <option value="">select option</option>
                    @foreach ($admin as $admin )
                        <option value="{{$admin->id}}">{{$admin->first_name}}</option>
                    @endforeach
                    </select>
                    <label for="">Category</label>
                    <select name="category_name" id="">
                        <option value="">select option</option>
                        @foreach ($category as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>                            
                        @endforeach
                    </select>
                    <button type="submit">Submit</button>
                </form>
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>CreateBy</th>
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
                                <td>{{$product->InCategory->name}}</td>
                                <td>{{$product->createBy->first_name}}</td>
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
        </section>
    </div>

@endsection
@section('scripts')
    <script>
        // Đợi tài liệu được tải hoàn toàn
        document.addEventListener('DOMContentLoaded', function() {
            // Tìm phần tử thông báo
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                // Thiết lập hẹn giờ để ẩn thông báo sau 10 giây (10000 ms)
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 5000); // 10 giây
            }
        });
    </script>
@endsection
