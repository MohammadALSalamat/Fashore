@extends('layouts.back-layout.main_desgin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit  Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit banner</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit <small> Banners</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ route('Edit_banner' , $edit_banner->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        value = "{{ $edit_banner->Title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputtextarea">Description</label>
                                    <textarea id="summer" name="description">
                                        {{ $edit_banner->Description }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputavater">Banner Image</label>
                                    <input type="hidden" name="current_image" value ="{{ $edit_banner->images }}">
                                    <input type="file" name="image" class="form-control" id="exampleInputavatar">
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                            name="status"
                                            @if ($edit_banner->status === 1)
                                                checked
                                            @endif
                                            >
                                        <label class="custom-control-label" for="customSwitch3">Once You Toggle this
                                            button then you agree to Activate the Banner</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit Banner</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection
@section('script')
<!-- jquery-validation -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js">
</script>
 <!-- Summernote -->
 <script src="{{ url('admin-style/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <script>
    $(document).ready(function() {
            $('#summer').summernote();
        });
</script>
@stop
