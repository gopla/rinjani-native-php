<?php
$id = $_GET['id'];

$sql = "select * from products where id_products = '$id'";
$q = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($q)) {
    ?>
    <div class="card-header">
        <h3>
            <i class="fas fa-campground    "></i>
            <span><?php echo $row[2] ?></span>
        </h3>
    </div>
    <div class="detail-container">
        <div class="img-card">
            <img src="../assets/img/products-img/<?php echo $row[6] ?>">
        </div>
        <div class="detail-card">
            <h2>Details</h2>
            <hr>
            <h3>Price &nbsp; : <?php echo "Rp. " . number_format($row[3]) ?></h3>
            <h3>Stock &nbsp;: <?php echo $row[4] . " Pcs" ?></h3>
            <span><?php echo $row[5] ?></span>
        </div>
    </div>
<?php
}
?>