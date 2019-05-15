<div class="card" style="width:80%; height:auto; margin:8% 0 0 8%;">
    <div class="item-container">
        <?php
        include_once "config/connect.php";

        $sql = "select * from products where stock > 0";
        $q = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($q)) {
            ?>
            <div class="item-card">
                <img src="assets/img/products-img/<?php echo $row[6] ?>">
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