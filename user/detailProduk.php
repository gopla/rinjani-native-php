<?php
require_once "config/connect.php";
$id = $_GET['id'];
$sql = "select * from products where id_products = '$id'";
$q = mysqli_query($con, $sql);
$row = mysqli_fetch_array($q);
?>
<div class="card" style="width:80%; height:auto; margin:8% 0 0 8%; background:url(assets/img/cart.png)">
  <div class="card-header">
    <h2>
      <i class="fas fa-campground    "></i>
      <span><?php echo $row[2] ?></span>
    </h2>
  </div>
  <div class="detail-container">
    <div class="detail-card">
      <h2>Details</h2>
      <hr>
      <h3>Price &nbsp; : <?php echo "Rp. " . number_format($row[3]) ?></h3>
      <h3>Stock &nbsp;: <?php echo $row[4] . " Pcs" ?></h3>
      <span><?php echo $row[5] ?></span>
    </div>
    <div class="img-card">
      <img src="assets/img/products-img/<?php echo $row[6] ?>">
    </div>
    <form action="user/controllerCart.php?act=store" method="post">
      <a href="index.php?menu=catalogue" class="btn btn-cart">
        <i class="fas fa-arrow-left    "></i>
        <span>Back</span>
      </a>
      <input type="hidden" name="idUser" value="<?php echo $_SESSION['id'] ?>">
      <input type="hidden" name="id" value="<?php echo $row[0] ?>">
      <button class="btn btn-cart" onclick="return confirm('Added to Cart~')">
        <i class="fas fa-cart-plus    "></i>
        <span>Add to Cart</span>
      </button>
    </form>
  </div>
</div>