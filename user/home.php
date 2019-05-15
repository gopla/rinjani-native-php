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
						$rowImg = mysqli_fetch_array($sqlImg);
						?>
						<img src='assets/img/products-img/<?php echo $rowImg[6] ?>'>
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
		<div class="parent1">
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