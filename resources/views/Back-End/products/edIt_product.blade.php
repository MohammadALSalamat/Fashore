@extends('layouts.back-layout.main_desgin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Modify products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Modify The Product</li>
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
                            <h3 class="card-title">Modify <small> Product</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ route('Edit_product' , $Edit_product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Sub Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="Product_id">
                                    <option value = "{{ $Edit_product->Category_id->id }}">{{ $Edit_product->Category_id->Cat_name }}</option>
                                        @foreach ($showCategories as $MainCategory)
                                        @if ($MainCategory->parent_id === 0)
                                        <option disabled="disabled">{{ $MainCategory->Cat_name }} (Main Category Not Selected)</option>
                                        @foreach ($MainCategory->frontCategory as $subcat)
                                        <option value="{{ $subcat->id }}"> &nbsp;&nbsp;&nbsp;&nbsp;{{ $subcat->Cat_name }} </option>
                                        @endforeach
                                        @endif
                                      @endforeach
                                    </select>
                                  </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="product_name" class="form-control"
                                        placeholder="Eg: Blue Tshirt , Zara Shoes , Addedas ........." value="{{ $Edit_product->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputtextarea">Description</label>
                                    <textarea id="summer" name="description">
                                        {!! $Edit_product->Description !!}
                                    </textarea>
                                </div>
                                <label for="" class="mt-2">Product Price</label>
                                <div class="mb-3 input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name ="product_price"
                                        placeholder="Enter the Price of current product EX: 400 , 500 ,1500"value="{{ $Edit_product->price }}">
                                </div>
                                <!-- Color Picker -->
                                <div class="outline-none form-group ">
                                    <label> Product Color:</label>
                                    <div class="outline-none input-group my-colorpicker2 ">
                                        <input type="text" class="outline-none form-control " name ="product_color"
                                            placeholder="Choose the color of your Product EX: red , green , pink ........" value="{{ $Edit_product->product_color }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- Color Picker -->
                                <div class="outline-none form-group ">
                                    <label> Product Code:</label>
                                    <div class="outline-none input-group my-colorpicker2 ">
                                        <input type="text" class="outline-none form-control " name ="product_code"
                                            placeholder="Put an unique Code for your product EX: GreenProduct-S , RedProduct-Xl , ABC-Product........" value="{{ $Edit_product->product_code }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputavater">Product Image</label>
                                    <input type="hidden" name ="current_image" value="{{ $Edit_product->product_image }}">
                                    <input type="file" name="product_image" class="form-control" id="exampleInputavatar">
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                            name="status" @if ($Edit_product->status == 1)
                                                    checked
                                            @endif>
                                        <label class="custom-control-label" for="customSwitch3">Once You Toggle this
                                            button then you agree to Activate the Product</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection @section('script')
<!-- jquery-validation -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<script src="{{ url('admin-style/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('admin-style/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ url('admin-style/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('admin-style/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summer').summernote();
    });
    //Number inmation Euro
    $('[data-mask]').inputmask()
    // prifile validate
    $(function() {
        $('#quickForm').validate({
            rules: {
                product_name: {
                    required: true,

                },
                product_price: {
                    required: true,
                    number:true
                },
                product_color: {
                    required: true,
                },
                product_code: {
                    required: true,
                },

            },
            messages: {
                product_name: {
                    required: "Please enter a Name For Your Product",
                },
                product_price: {
                    required: "Please Fill this From with Product Price and Must be a number",
                    number: "Pleace enter A Number Only"
                },
                product_color: {
                    required: "Please Fill this field With a color ",
                },
                product_code: {
                    required: "Please Fill this field With a unique code number ",
                },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@stop
