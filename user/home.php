<div class="bodyhome">

	<div id="slider">
		<img src="assets/img/28.jpg" id="sliderImg1">
		<img src="assets/img/b.jpg" id="sliderImg2">
		<img src="assets/img/d.jpg" id="sliderImg3">
		<img src="assets/img/e.jpg" id="sliderImg4">
		<img src="assets/img/hd.jpg" id="sliderImg5">
		<img src="assets/img/exp3.jpg" id="sliderImg6">
	</div>

	<div class="ket">
		B E S T &nbsp; S E L L E R
		<hr>
		<br>

		<div class="news">
			<div class="container" style="margin-left: 10%;">
				<div class="owl-carousel">
					<?php
					include "config/connect.php";
					$sqlBest = mysqli_query($con, "select id_products, sum(qty) as 'jml' from transactions_detail group by id_products limit 7");
					while ($rowBest = mysqli_fetch_array($sqlBest)) {
						$sqlImg = mysqli_query($con, "select * from products where id_products = '$rowBest[0]'");
						$row = mysqli_fetch_array($sqlImg);
						?>
						<div>
							<center>
								<img src="assets/img/products-img/<?php echo $row[6] ?>" style="width:200px; height:200px;">
							</center>
							<h2>
								<?php
								if (strlen($row[2]) > 23) {
									echo substr($row[2], 0, 20) . ". . .";
								} else {
									echo $row[2];
								}
								?>
							</h2>
							<br>
							<h3><?php echo "Rp. " . number_format($row[3], 0, ',', '.') ?></h3>
							<br>
							<form action="user/controllerCart.php?act=store" method="post">
								<input type="hidden" name="idUser" value="<?php echo $_SESSION['id'] ?>">
								<input type="hidden" name="id" value="<?php echo $row[0] ?>">
								<button class="btn btn-putih" onclick="return confirm('Added to Cart~')">
									<i class="fas fa-cart-plus    "></i>
									<span>Add to Cart</span>
								</button>
								<a href="index.php?menu=detail&&id=<?php echo $row[0] ?>" class="btn btn-putih">
									<i class="fas fa-eye    "></i>
								</a>
							</form>
						</div>
					<?php
				}
				?>
				</div>
			</div>
		</div>


		<div class="parent">
			<div class="gm">
				<img src="assets/img/rinjani.png" width="490" height="350">
			</div>

			<div class="gm1">
				<div class="ab">
					A B O U T
				</div>

				<hr style="width:100%; margin:1%;">
				Rinjani is an online shop that provides the most complete hiking <br><br>
				equipment in Indonesia.You can get all the perfect hiking here.<br><br>
				With affordable prices and quality goods, of course, can provide <br><br>
				the convenience of shopping for climbers in Indonesia.So what are<br>
				you waiting for, immediately get your favorite climbing item here<br><br>
				<br>
				RINJANI ' 19
			</div>
		</div>
		<div class="card" style="margin-top:2%; width:80%; height:400px; margin-left:10%;">
			<div class="card-header">
				<h1>
					<i class="fas fa-map-marker-alt    "></i>
					<span>Find Us</span>
				</h1>
			</div>
			<div id="googleMap" style="width:100%">

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
		</div>
		<div class="parent1" style="margin-top:5%;">
			<div class="tx">
				<br>Rinjani Outdoor Shop
			</div>
			<br><br>
			<div class="tx1">
				You can get all the perfect hiking here.
			</div>
			<br><br>
			<div class="tx2">
				Copyright &copy; 2019 Rinjani Outdoor Shop.
				<br>
				Developed with <span style="color:red;">&#10084;</span> by April-Gopla.
			</div>
		</div>

	</div>



	<script>
		$("#sliderShuffle").cycle({
			next: '#next',
			prev: '#prev'
		});

		$('.owl-carousel').owlCarousel({
			items: 4,
			loop: true,
			margin: 5,
			autoplay: true,
			autoplayTimeout: 2000, //3 Second
			nav: true,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: true
				},
				1000: {
					items: 4,
					nav: true
				}
			}

		});
	</script>