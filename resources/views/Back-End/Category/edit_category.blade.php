@extends('layouts.back-layout.main_desgin')
@section('style')
       <!-- Select2 -->
       <link rel="stylesheet" href="{{ url('admin-style/plugins/select2/css/select2.min.css')}}">
       <link rel="stylesheet" href="{{ url('admin-style/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
       <!-- Bootstrap4 Duallistbox -->
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Update New Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Categories</li>
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
                            <h3 class="card-title">Update <small> Categories</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ route('Edit_category' ,$Edit_category->id) }}" method="post">
                            @csrf
                            <div class="card-body"  >
                                <div class="form-group" >
                                    <label for="exampleInput1">Category Name</label>
                                    <input type="text" name="name_cat" class="form-control" id="exampleInput1"
                                         value={{$Edit_category->Cat_name  }}>
                                </div>
                                <div class="form-group">
                                    <label>Category Level</label>
                                    <select class="w-full form-control select2" name="level" >
                                        @if ($Edit_category->parent_id == 0)
                                        <option value="0">Main Category</option>
                                        @foreach ($sub_Cats as $cats)
                                        <option value ="{{ $cats->id }}">{{ $cats->Cat_name }}</option>
                                        @endforeach
                                        @else
                                        <option value="{{$level->id}}">{{ $level->Cat_name }}</option>
                                        <option value="0">Main Category</option>
                                        @foreach ($sub_Cats as $cats)
                                        <option value ="{{ $cats->id }}">{{ $cats->Cat_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <p class ="mt-4 mb-4"><strong class="text-red-800" >Note :</strong> To choose [" Main Category " ] select the section(Main category) otherwise your choise will be ['Sub Category']</p>
                                <div class="form-group">
                                    <label for="exampleInput3">Category URL</label>
                                    <input type="text" name="url_cat" class="form-control" id="exampleInput3"
                                    value="{{ $Edit_category->Cat_url }}">
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="custom3"
                                            name="status"
                                            @if ($Edit_category->status == 1)
                                            checked
                                            @endif>
                                        <label class="custom-control-label" for="custom3">Once You Toggle this
                                            button then you agree to Activate the Banner</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update New Category</button>
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
<script src="{{ url('admin-style/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            })
    </script>
@endsection
