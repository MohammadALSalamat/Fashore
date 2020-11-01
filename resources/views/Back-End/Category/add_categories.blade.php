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
                    <h1>Add New Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Categories</li>
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
                            <h3 class="card-title">Add <small> Categories</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ route('store_category') }}" method="post">
                            @csrf
                            <div class="card-body"  >
                                <div class="form-group">
                                    <label for="exampleInput1">Category Name</label>
                                    <input type="text" name="name_cat" class="form-control" id="exampleInput1"
                                        placeholder="Eg:Shirts , Shoes , Belts ...">
                                </div>
                                <div class="form-group">
                                    <label>Category Level</label>
                                    <select class="w-full form-control select2" name="level" >
                                        <option value="0">Main Category</option>
                                        @foreach ($levels as $level)
                                        <option value ="{{ $level->id }}">{{ $level->Cat_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <p class ="mt-4 mb-4"><strong class="text-red-800" >Note :</strong> To choose [" Main Category " ] select the section(Main category) otherwise your choise will be ['Sub Category']</p>
                                <div class="form-group">
                                    <label for="exampleInput3">Category URL</label>
                                    <input type="text" name="url_cat" class="form-control" id="exampleInput3"
                                        placeholder="Eg:T-shirt , Shoes , casual_Suit ...">
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="custom3"
                                            name="status" value="1">
                                        <label class="custom-control-label" for="custom3">Once You Toggle this
                                            button then you agree to Activate the Category</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add New Category</button>
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
