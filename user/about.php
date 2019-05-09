<div class="card" style="margin-top:7%; width:80%; margin-left:10%;">
    <div class="card-header">
        <h1>
            <i class="fas fa-user-alt    "></i>
            <span>Profile </span>
        </h1>
    </div>
    <img src="assets/img/april.jpg" class="prof-pict">
    <div class="bio">
        <span>
            <p>Nama : Aprilia Putri Ariantini</p><br>
            <P>Tempat, tanggal lahir : Probolinggo, 18 April 2000</p><br>
            <p>Usia : 18 tahun </p><br>
            <p>Jenis kelamin : Wanita</p><br>
            <p>Agama : Islam</p><br>
            <p>Alamat : Perum Griyashanta Blok C No.245, Malang</p><br>
            <p>Kota Asal : Probolinggo</p><br>
        </span>
    </div>
    <div class="qt">"Bukan gunung yang kami taklukan, tapi diri sendiri"<br><b>-Sir Edmund Hillary</b></div>
</div>
</div>
<div class="card" style="margin-top:2%; width:80%; height:400px; margin-left:10%;">
    <div class="card-header">
        <h1>
            <i class="fas fa-map-marker-alt    "></i>
            <span>Temukan Kami</span>
        </h1>
    </div>
    <div class="container_body">
        <div id="googleMap">

        </div>
        <div id="googleMap">
            <form action="index.php" method="post">
                <div class="form-item">
                    <label for="var_comment">Tinggalkan Komentar : </label>
                    <textarea name="var_comment" cols="55" rows="11" class="form-input"></textarea>
                </div>
                <div class="form-item">
                    <button type="submit" class="btn btn-ijo" onclick="thanks()">
                        <i class="fas fa-paper-plane    "></i>
                        <span>Kirim</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAIKOY-FBIUFNDKbgQic-y2mbUbqLF25PQ&callback=viewMap
    "></script>
<script>
    function thanks() {
        alert('Terima kasih atas masukannya! ^o^');
    }

    function viewMap() {
        var malang = {
            lat: -8.0972979,
            lng: 112.5424168
        };
        var contentString = '<h2>Rinjani Outdoor</h2>'
        var mapProp = {
            center: malang,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var maps = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var infoWindow = new google.maps.InfoWindow({
            content: contentString,
            position: malang
        });

        var marker = new google.maps.Marker({
            position: malang,
            map: maps,
            animation: google.maps.Animation.BOUNCE
        });

        marker.addListener('click', function() {
            infoWindow.open(maps, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', viewMap);
</script>