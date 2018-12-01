@extends('backend.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.css')}}">

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Farmers Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Farmers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Farmers</h3>

                        <button data-target="#new_coutry_modal" data-toggle="modal" class="btn btn-success float-right" >Add New Farmer</button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Crop Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($farmers as $farmer)
                                <tr>
                                    <td>{{$farmer->crop->name}}</td>
                                    <td>{{$farmer->phone_number}}</td>
                                    <td>{{$farmer->email}}</td>


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
    </section>

    <div class="modal " tabindex="-1" role="dialog" id="new_coutry_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Farmer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.farmer.save_new_farmer')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">



                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="name"> Crop Name</label>
                               <select class="form-control" id="name" name="crop_id">
                                   <option selected disabled>Please Select a crop</option>

                                   @foreach($crops as $crop)
                                       <option value="{{$crop->id}}">{{$crop->name}}</option>
                                       @endforeach
                               </select>
                            </div>



                            <div class="form-group col-md-6">
                                <label for="phone_number"> Phone Number</label>
                                <input name="phone_number"  type="text" id="phone_number" class="form-control">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="email"> Email</label>
                                <input name="email" type="email" id="email" class="form-control">
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- /.content -->
@endsection

@section('script')
    <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('adminlte/plugins/fastclick/fastclick.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
