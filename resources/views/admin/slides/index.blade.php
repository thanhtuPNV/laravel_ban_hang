@extends('admin.master')
@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-chart-pie"></i>
        </span> Slide
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Slide <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div id="card-title-btn-blogs">
              <h4 class="card-title">Slide: <b class="text-danger">{{count($slides)}}</b></h4>
              <a type="button" class="btn btn-gradient-danger btn-fw" href="/admin/slides/create">ADD NEW</a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Id Slide </th>
                    <th> Image </th>
                    <th> Edit </th>
                    <th> Delete </th>
                  </tr>
                </thead>
                @foreach ($slides as $slide)
                <tbody>
                  <tr>
                    <td>{{ $slide->id }}</td>
                    <td>
                      <img src="/source/image/slide/{{ $slide->image }}" class="me-2" alt="Avatar" />
                    </td>
                    <td>
                      <a href="/admin/slides/update/{{ $slide->id }}" onclick="return confirm('Bạn có muốn sửa!')"><i class="mdi mdi-pencil-box"></i></a>
                    </td>
                    <td>
                      <a href="/admin/slides/delete/{{ $slide->id }}" onclick="return confirm('Bạn có muốn xóa!')"><i class="mdi mdi-delete"></i></a>
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