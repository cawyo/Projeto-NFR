<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/homeStyle.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Home</title>
</head>
<body>
    <?php session_start();
                if (isset($_POST['logout'])) {
                    session_destroy();
                    exit();
                }
        ?>
    <div class="navbar">
        <div class="user-info">
            <img src="../resources/perfil.png" alt="Foto de Perfil">
            <span>
                <?php
                if($_SESSION == !NULL){
                    echo $_SESSION['usuario'];
                }
                else{
                    echo "Convidado";
                }
                ?>
            </span>
        </div>
        <div class="favMenu">
                <label for="menu-icon">&#9776;</label>
        </div>
        <nav>
            <a href="sobreNos.php">Sobre nós</a>
            <a href="" class="sair">Encerrar sessão</a>
        </nav>
    </div>
    
    <div class="logo">
    <img src="../resources/logo.png" alt="">
    </div>

    <div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


            var menuIcon = document.querySelector('label');
            var nav = document.querySelector('nav');

            menuIcon.addEventListener('click', function () {
            var currentState = parseInt(window.getComputedStyle(nav).left);
                
            if (currentState === 0) {
                    closeNav();
            } else {
                    openNav();
            }
            });

            function openNav() {
                nav.style.right = '0';
                document.addEventListener('click', closeNavOutside);
            }

            function closeNav() {
                nav.style.right = '-250px';
                document.removeEventListener('click', closeNavOutside);
            }

            function closeNavOutside(event) {
            if (!nav.contains(event.target) && event.target !== menuIcon) {
                closeNav();
            }
            }


            $(document).ready(function(){
            $('.sair').click(function(){
                $.ajax({
                    type: 'POST',
                    data: { logout: true },
                    success: function(data){
                        window.location.href = 'login.php';
                    },
                    error: function(error){
                        console.log('Erro durante o logout: ' + error);
                    }
                });
            });
        });
        

        function changePos(marker,aircraftData, speed) {
        
            const newLat = marker.getLatLng().lat + (Math.sin(aircraftData.true_track * (Math.PI / 180)) * speed);
            const newLng = marker.getLatLng().lng + (Math.cos(aircraftData.true_track * (Math.PI / 180)) * speed);

            
            marker.setLatLng([newLat, newLng]);
        }

        function updatePositions() {
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    
                    const aircraftData = layer.options.aircraftData;

                    changePos(layer, aircraftData, aircraftData.velocity*0.0000001);
                }
            });
        }
        

        // const planeIcon = L.icon({
        // iconUrl: '../resources/PlaneIcon.png',
        // iconSize: [32, 32],
        // iconAnchor: [16, 32],
        // popupAnchor: [0, -32]
        // });

        function createPlaneIcon(degrees) {
        return L.icon({
            iconUrl: `../resources/PlaneIcon${degrees}dg.png`,
            iconSize: [32, 32],
            iconAnchor: [16, 16],
            popupAnchor: [0, -32]
        });
        }

        var map = L.map('map',{worldCopyJump: true} ).setView([-25.4372, -49.2700], 6);

        var conversionFactor = map.distance([0, 0], [0, 1]);
    
        var tiles =  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: 3,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        map.removeControl(map.zoomControl);

        function createMarkers(map, aircraftData) {
            for (let i = 0; i < aircraftData.length; i++) {
                let aircraft = aircraftData[i];

            if (aircraft.latitude !== undefined && aircraft.longitude !== undefined) {
            
                const roundedTrueTrack = Math.round(aircraft.true_track / 5) * 5;
                console.log(aircraft.callsign, roundedTrueTrack)

                const icon = createPlaneIcon(roundedTrueTrack);

                const marker = L.marker([aircraft.latitude, aircraft.longitude], {icon: icon})

                marker.bindPopup(`<b>Callsign:</b> ${aircraft.callsign}<br><b>Altitude:</b> ${aircraft.altitude}`)
                marker.addTo(map);

                marker.options.aircraftData = aircraft;
                
                setInterval(updatePositions, 5000);
                }
            }
        }


        function fetchData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    var data = JSON.parse(this.responseText);
                    console.log(data);
                    createMarkers(map, data);
                }
            };
            xhttp.open("GET", "FlightData.php", true);
            xhttp.send();
            }
        fetchData()




        </script>

</body>
</html>
