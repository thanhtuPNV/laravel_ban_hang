@extends('admin.master')
@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-contacts"></i>
        </span> Bill
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Bill <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bill: <b class="text-danger">{{count($bills)}}</b></h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Id User </th>
                    <th> Date Order </th>
                    <th> Total </th>
                    <th> Payment </th>
                    <th> Note </th>
                  </tr>
                </thead>
                @foreach ($bills as $bill)
                <tbody>
                  <tr>
                    <td>{{ $bill->id_customer }}</td>
                    <td>{{ $bill->date_order }}</td>
                    <td>{{ $bill->total }}</td>
                    <td>{{ $bill->payment }}</td>
                    <td>{{ $bill->note }}</td>
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