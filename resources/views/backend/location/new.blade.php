@extends('backend.layouts.master')
@section('style')

    <style type="text/css">
        #map{ width:700px; height: 500px; }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

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

                                    <form method="post" action="{{route('admin.location.save_farmer_location')}}">
                                        {{csrf_field()}}


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

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="lat">Selected Latitude</label>
                                            <input type="text" id="lat" name="lat" class="form-control" readonly="yes">
                                        </div>
                                        {{--<br>--}}
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="lng">Selected Longitude</label>
                                            <input type="text" id="lng"  class="form-control" name="long" readonly="yes">
                                        </div>
                                    </div>


                                        <div class="row">

                                            <!--map div-->
                                            <div id="map"></div>

                                            <!--our form-->






                                            <script type="text/javascript" src="map.js"></script>
                                        </div>

                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger float-left">Reset</button>
                                        <button type="submit" class="btn btn-success float-right" >Submit</button>
                                    </div>

                                    </form>
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
<script>



    //Set up some of our variables.
    var map; //Will contain map object.
    var marker = false; ////Has the user plotted their location marker?

    //Function called to initialize / create the map.
    //This is called when the page has loaded.
    function initMap() {

        //The center location of our map.
        var centerOfMap = new google.maps.LatLng(-0.3711200400357318, 35.9429081018219);

        //Map options.
        var options = {
            center: centerOfMap, //Set center.
            zoom: 7 //The zoom value.
        };

        //Create the map object.
        map = new google.maps.Map(document.getElementById('map'), options);

        //Listen for any clicks on the map.
        google.maps.event.addListener(map, 'click', function(event) {
            //Get the location that the user clicked.
            var clickedLocation = event.latLng;
            //If the marker hasn't been added.
            if(marker === false){
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true //make it draggable
                });
                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function(event){
                    markerLocation();
                });
            } else{
                //Marker has already been added, so just change its location.
                marker.setPosition(clickedLocation);
            }
            //Get the marker's location.
            markerLocation();
        });
    }

    //This function will get the marker's current location and then add the lat/long
    //values to our textfields so that we can save the location.
    function markerLocation(){
        //Get location.
        var currentLocation = marker.getPosition();
        //Add lat and lng values to a field that we can save.
        document.getElementById('lat').value = currentLocation.lat(); //latitude
        document.getElementById('lng').value = currentLocation.lng(); //longitude
    }


    //Load the map when the page has finished loading.
    google.maps.event.addDomListener(window, 'load', initMap);
</script>

@endsection
