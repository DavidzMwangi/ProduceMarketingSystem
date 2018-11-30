@extends('backend.layouts.master')
@section('style')


@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">New Post</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="whole_content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Post</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane active " id="settings">
                                    @if(count($errors->all())>0)
                                        <div class="alert alert-danger">

                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>

                                            @endforeach
                                        </div>

                                    @endif


                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="farmer_name" class=" control-label">Farmer Name</label>


                                          <select class="form-control" id="farmer_name" name="farmer_id">
                                              <option disabled selected>Please Select a farmer</option>


                                              @foreach($farmers as $farmer)
                                                  <option value="{{$farmer->id}}">{{$farmer->phone_number}}</option>
                                                  @endforeach
                                          </select>

                                        </div>

                                    </div>




                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger float-left">Reset</button>
                                        <button type="button" class="btn btn-success float-right" @click="saveNewPost()">Submit</button>
                                    </div>
                                </div>


                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('script')


@endsection
