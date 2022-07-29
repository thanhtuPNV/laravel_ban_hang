@extends('admin.master')
@section('content')
<!-- partial -->
<div class="main-panel">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-blogger"></i>
                </span> Slide
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/blogs">Back To Slide</a></li>
                    @if ($action == 'create')
                    <li class="breadcrumb-item active" aria-current="page">Form Add New</li>
                    @elseif ($action == 'update')
                    <li class="breadcrumb-item active" aria-current="page">Form Update</li>
                    @endif
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($action == 'create')
                        <h4 class="card-title">Form Add New</h4>
                        @elseif ($action == 'update')
                        <h4 class="card-title">Form Update</h4>
                        @endif
                        <form class="forms-sample" action={{ $action == 'create' ? '/admin/slides/create' : '/admin/slides/update/' . $slide->id }} method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- @method('put') -->
                            <!-- File Upload -->
                            <div class="form-group">
                                <label>File upload</label>
                                
                                <input type="file" name="image" class="file-upload-default" onchange="changeImage(event)">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <img id="preview-img" class="col-6 img-thumbnail" style="width: 10rem" alt="" src="/source/image/slide/{{ isset($slide) ? $slide->image : '' }}">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                </span>
                                    <script>
                                        const changeImage = (e) => {
                                            var preImage = document.getElementById("preview-img")
                                            preImage.src = URL.createObjectURL(e.target.files[0])
                                            preImage.onload = () => {
                                                URL.revokeObjectURL(output.src)
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            <!-- File Upload -->
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
    @endsection