<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Clustering</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>--}}

</head>
<body>



<h3>

</h3>
<div id="map"></div>

<script type="text/javascript" src="{{asset('plugins/axios/axios.min.js')}}"></script>
<script>



    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 3,
            center: {lat: -0.3381616874717646, lng: 36.0967166955719}
        });
        var url34='{{url('get_all_locations')}}'+'/'+{{$crop}}

        axios.get(url34)
            .then(function (res) {
                // console.log(res.data.locations);


                var i;
                for (i = 0; i < res.data.locationale.length; i++) {
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(res.data.locationale[i].lat), lng:parseFloat( res.data.locationale[i].long)},
                        map: map,
                        title: 'Potatoes'
                    });

                }


            });




    }



</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAELZVjuyJ3O8qssNbh5xYmCW6wTTzo_r8&callback=initMap">
</script>
</body>
</html>