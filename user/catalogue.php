<div class="card" style="width:80%; height:auto; margin:8% 0 0 8%;">
    <div class="card-header">
        <h2>
            <i class="fas fa-list"></i>
            <span>Catalogue</span>
        </h2>
    </div>
    <div class="mini-card-container">
        <table>
            <tr>
                <form action="" method="post">
                    <td>
                        <label for="combo_cat">Filter : </label>
                    </td>
                    <td>
                        <select name="combo_cat" class="form-input">
                            <option value="99" selected> - All</option>
                            <?php
                            require_once "config/connect.php";
                            $sql = "select * from categories";
                            $q = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="Filter" name="btnFil" class="btn btn-ijo">
                    </td>
                </form>
            </tr>
        </table>
        <table>
            <tr>
                <form action="" method="post">
                    <td>
                        <label for="var_search">Product Name : </label>
                    </td>
                    <td>
                        <input type="text" name="var_search" class="form-input">
                    </td>
                    <td>
                        <input type="submit" value="Search" name="btnSrc" class="btn btn-ijo">
                    </td>
                </form>
            </tr>
        </table>
    </div>
    <?php
    include_once "config/connect.php";

    if (isset($_POST['btnSrc'])) {
        $src = $_POST['var_search'];
        $rslt = $_POST['var_search'];
    } else {
        $src = "";
    }

    if (isset($_POST['btnFil'])) {
        $cat = $_POST['combo_cat'];
        $sqlCat = "and id_categories = '$cat'";
        $sqlNameCat = mysqli_query($con, "select name from categories where id_categories = '$cat'");
        $nameCat = mysqli_fetch_array($sqlNameCat);
        $rslt = $nameCat[0];
    } else {
        $sqlCat = "";
    }

    $sql = "select * from products where stock > 0 and name like '%$src%' " . $sqlCat;
    if (!empty($rslt)) {
        ?>
        <div class="mini-card-container">
            <h2>Showing results of "<?php echo $rslt; ?>"</h2>
        </div>
    <?php } ?>
    <div class="item-container">
        <?php
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