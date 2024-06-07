<?php

?>

@extends("admin::layouts.master")
@section("content")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-center align-items-center">
                    <h1>List Role</h1>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success text-center" id="success-alert">
                 {{ session('success') }}
                </div>
            @endif

        </section>
        <div class="d-flex justify-content-end px-5 pb-3">
            <a href="{{route('admin.role.create')}}" class="btn btn-primary">Add Role</a>
        </div>
        <section>
            <div class="container-fluid px-5">

                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Them</th>
                        <th>Xoa</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($role as $role)
                            <tr>
                                <td>{{$role->id}}</td>

                                <td>{{$role->name}}</td>

                                <td>
                                    <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-info">View</a></td>
                                <td>
                                    <a class="btn btn-danger" href="{{route('admin.role.delete', $role->id)}}">Delete</a>
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
