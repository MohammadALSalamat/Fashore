@extends('layouts.back-layout.main_desgin')
@section('style')
    <link rel="stylesheet" href="{{ url('admin-style/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin-style/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin-style/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin-style/dist/css/adminlte.min.css') }}">
@stop
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>View Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">View Categories</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable To View Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Category Name</th>
                                            <th>Category Type</th>
                                            <th>Category URl</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="line-height: 4 !important;">
                                        @foreach ($categories as $category)
                                            <tr style="text-align: center;">
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->Cat_name }}</td>
                                                <td>
                                                    @if ($category->parent_id == 0)
                                                    <span class="text-red-500"> Main Category</span>
                                                    @else
                                                    <span class="text-green-500"> Sub Category</span>
                                                    @endif
                                            </td>
                                                <td>{{ $category->Cat_url }}</td>
                                                <td>
                                                    @if ($category->status == 0)
                                                    <span class="text-red-500"> DiaActive</span>
                                                    @else
                                                    <span class="text-green-500"> Active </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('CategorySection/Edit/' . $category->id) }}"><button type="button"
                                                            style="width: 45%" class="btn btn-outline-primary btn-md"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i>
                                                            Modify</button></a>
                                                    <a href="javascript:"><button rel="{{ $category->id }}" rel1="category"
                                                            type="button" style="width: 45%"
                                                            class="btn btn-outline-danger btn-md deleteRecord">
                                                            Delete</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('admin-style/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>
@stop
