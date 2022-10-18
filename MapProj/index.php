<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
        <link rel="stylesheet" href="styles/map_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        
        <div class="container mb-5 pt-5 animate__animated animate__backInDown"><h1 style="text-align: center;">Open Street Maps</h1></div>
        <div class="container animate__animated animate__backInUp"><div id="map"></div></div>

        <?php 
            // $name = "test";

            // echo "Test this out: $name";
            $data_b = new PDO('mysql:host=localhost;dbname=leafletmap', 'root', '');
            // $success = mysqli_connect('localhost', 'root', '','leafletmap');
            // if ($success->connect_error) {
            //     die("Connection failed: " . $success->connect_error);
            //   }

            // if (!$success) {
            //     echo "<p>Error connecting to MySQL:" . mysqli_connect_error() . "</p>";
            // }
            // else {
            //     echo "<p>Success Connecting</p>";
            // }

            $sql= 'SELECT latitude, longitude FROM coordinates';

            $result_final = $data_b->query($sql);
            if (!$result_final) {

                echo "An error occured. \n";
                exit;

            }

            $rows = array();
            while($r = $result_final->fetch(PDO::FETCH_ASSOC)){

                $rows[] = $r;
                $lat[] = $r['latitude'];
                $long[] = $r['longitude'];

            }
            print json_encode($rows);
            $data_b = NULL;

            // $result = mysqli_query($success, $sql);

            // $coords = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // print_r($coords);

        ?>
<!-- ------------------------------------------------------------------------------------------------------------ -->
        <?php 
            // $db = new PDO('mysql:host=localhost;dbname=poi', 'root', ''); 
            // $sql = "SELECT name,user_date,user_time,address,lat,lng,icon_name FROM tblmarker"; 

            // $rs = $db->query($sql); 
            // if (!$rs) { 
            //     echo "An SQL error occured.\n"; 
            //     exit; 
            // } 

            // $rows = array(); 
            // while($r = $rs->fetch(PDO::FETCH_ASSOC)) { 
            //     $lat[] = $['lat']; 
            //     $long[] = $r['long'];

            // } 
            // print json_encode($rows); 
            // $db = NULL; 
        ?> 
<!-- ---------------------------------------------------------------------------------------------------------- -->
        <pre id="arrPrint"></pre>
        <script>
            // const coordinates = [<?php $coords ?>];
            let mapSettings = {
                center: [10.657025,122.948841],
                zoom: 15
            }

            let map = new L.map('map', mapSettings);

            let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            map.addLayer(layer);

            let marker = new L.Marker([10.657025, 122.948841]);
            marker.addTo(map);

            // alert("This is a test to pass: <?php echo $name ; ?>");
            // let arr = ["Jack", "John", "James"];
            // document.getElementById("arrPrint").innerHTML = coordinates;
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>