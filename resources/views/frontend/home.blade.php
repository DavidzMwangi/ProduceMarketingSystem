<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container" id="local_content">

    <div class="row">
        <div class="col-lg-12 text-center">


            <h1 class="mt-5">Produce Marketing System</h1>
           <br>
           <br>
           <br>
        </div>
    </div>

    <div class="row">
    <div class="form-group col-1">
    <label >Search</label>

    </div>


        <div class="form-group col-4">

            <select id="crop_name" class="form-control" name="crop_name" v-model="selected_crop_id" @change="getFarmers(selected_crop_id)">
                @foreach(\App\Models\Crop::all() as $crop)
                    <option value="{{$crop->id}}">{{$crop->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group float-right">

           <a :href="'{{url('maps')}}'+'/'+selected_crop_id" class="btn btn-primary">View Map</a>
        </div>
    </div>



        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>


                <th>#</th>
                <th>Crop Name</th>
                <th>Farmer Phone Number</th>
                <th>Farmer Email</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(record,index) in farmers">
                <td>@{{ index }}</td>
                <td>@{{ record.crop.name }}</td>
                <td>@{{ record.phone_number }}</td>
                <td>@{{ record.email }}</td>

            </tr>

            </tbody>

        </table>

</div>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{{asset('plugins/axios/axios.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/vue/vue.min.js')}}"></script>
<script>
    // $(document).ready(function() {
    //     $('#example').DataTable();
    // } );

    let vrer=new Vue({
        el:'#local_content',
        data:{
            farmers:[],
            selected_crop_id:''
        },
        methods:{
            getFarmers:function (selected_crop_id) {
                let url='{{url('get_farmers')}}'+'/'+this.selected_crop_id;
                let me=this;
                axios.get(url)
                    .then(res=>{
                    console.log(res.data.farmers);
                        me.farmers=res.data.farmers;
                    })
                    .catch(err=>{
                        alert("An error has occured")
                    })
            }
        }
    })
</script>
</body>

</html>
