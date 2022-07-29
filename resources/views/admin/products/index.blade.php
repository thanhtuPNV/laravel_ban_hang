@extends('admin.master')
@section('content')
<!-- partial -->
<div class="main-panel">
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-blogger"></i>
                </span> Product
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Product <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div id="card-title-btn-blogs">
                            <h4 class="card-title">Product: <b class="text-danger">{{count($products)}}</b></h4>
                            <a type="button" class="btn btn-gradient-danger btn-fw" href="/admin/products/create">ADD NEW</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Unit Price</th>
                                        <th>Promotion Price</th>
                                        <th>Unit</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($products as $product)
                                <tbody>
                                    <tr>
                                        <th>{{ $product->name }}</th>
                                        <td>
                                            <img src="/source/image/product/{{ $product->image }}" class="me-2" alt="Avatar" />
                                        </td>
                                        <td>{{ $product->unit_price }}</td>
                                        <td>{{ $product->promotion_price }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <a href="/admin/products/update/{{ $product->id }}" onclick="return confirm('Bạn có muốn sửa!')"><i class="mdi mdi-pencil-box"></i></a>
                                        </td>
                                        <td>
                                            <a href="/admin/products/delete/{{ $product->id }}" onclick="return confirm('Bạn có muốn xóa!')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
    @endsection