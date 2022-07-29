@extends('admin.master')
@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-contacts"></i>
        </span> Type Product
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Type Product <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div id="card-title-btn-blogs">
              <h4 class="card-title">Type Product: <b class="text-danger">{{count($typeProducts)}}</b></h4>
              <a type="button" class="btn btn-gradient-danger btn-fw" href="/admin/typeProducts/create">ADD NEW</a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> Image </th>
                    <th> Description </th>
                    <th> Edit </th>
                    <th> Delete </th>
                  </tr>
                </thead>
                @foreach ($typeProducts as $typeProduct)
                <tbody>
                  <tr>
                    <td>{{ $typeProduct->name }}</td>
                    <td>
                      <img src="/source/image/product/{{ $typeProduct->image }}" class="me-2" alt="Avatar" />
                    </td>
                    <td>{{ $typeProduct->description }}</td>
                    <td>
                      <a href="/admin/typeProducts/update/{{ $typeProduct->id }}" onclick="return confirm('Bạn có muốn sửa!')"><i class="mdi mdi-pencil-box"></i></a>
                    </td>
                    <td>
                      <a href="/admin/typeProducts/delete/{{ $typeProduct->id }}" onclick="return confirm('Bạn có muốn xóa!')"><i class="mdi mdi-delete"></i></a>
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