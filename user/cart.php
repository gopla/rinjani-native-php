<div class="card" style="margin-top:7%; width:80%; margin-left:10%;">
    <div class="card-header">
        <h1>
            <i class="fas fa-cart-arrow-down    "></i>
            <span>My Cart</span>
        </h1>
        <form action="user/controllerCart.php?act=drop" method="post">
            <input type='hidden' name='idUser' value='<?php echo $_SESSION['id'] ?>'>
            <button onclick=" return confirm('Sure to drop the cart?')" class="btn btn-abang" style="float:right; margin-top:-3%;">
                <i class="fas fa-trash    "></i>
                <span>Delete All</span>
            </button>
        </form>
    </div>
    <table class="table">
        <?php
        require_once "config/connect.php";
        $idUser = $_SESSION['id'];
        $sql = "select * from cart where id_user = $idUser";
        $qCart = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($qCart);
        if ($cek < 1) {
            $status = 0;
            echo "
                <tr>
                    <td>
                        Your Cart is Empty :( <br>
                        Start buying some goods on our Catalog :)
                        <br><br>
                    </td>
                </tr>
            ";
        } else {
            $status = 1;
            $no = 0;
            $total = 0;
            while ($rowCart = mysqli_fetch_array($qCart)) {
                $sqlProduct = "select * from products where id_products = '$rowCart[1]'";
                $qProduct = mysqli_query($con, $sqlProduct);
                while ($row = mysqli_fetch_array($qProduct)) {
                    $no++;
                    $sub = $row[3] * $rowCart[2];
                    $price = number_format($row[3], 0, '.', '.');
                    echo "
                        <tr>
                            <td>
                                $no
                            </td>
                            <td>
                                <img src='assets/img/products-img/$row[6]' width='100px' height='100px'>
                            </td>
                            <td>
                                $row[2]
                            </td>
                            <td>
                                Rp. $price
                            </td>
                            " ?>
                    <td>
                        <form action="user/controllerCart.php?act=plus" method="post">
                            <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>">
                            <input type="hidden" name="id" value="<?php echo $rowCart[1] ?>">
                            <button class="btn btn-putih">
                                <i class="fas fa-plus    "></i>
                            </button>
                        </form>
                        <?php echo $rowCart[2] ?>
                        <form action="user/controllerCart.php?act=minus" method="post">
                            <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>">
                            <input type="hidden" name="id" value="<?php echo $rowCart[1] ?>">
                            <button class="btn btn-putih">
                                <i class="fas fa-minus    "></i>
                            </button>
                        </form>
                    </td>
                    <?php
                    echo "
                            <td style='color:#fc4700'>
                                <b>Rp. " . number_format($sub, 0, '.', '.') . "</b>
                            </td>
                            <td>
                            <form action='user/controllerCart.php?act=del' method='post'>
                                <input type='hidden' name='idUser' value='" . $_SESSION['id'] . "'>
                                <input type='hidden' name='id' value='" . $rowCart[1] . "'>
                    <button class='btn btn-abang'>
                        <i class='fas fa-times'></i>
                    </button>
                    </form>
                    </td>
                    </tr>
                    ";
                    $total = $total + $sub;
                }
            }
        }
        ?>
    </table>
    <div class="cart-footer">
        <h1>
            <span>
                Total :
            </span>
            <span style="float:right; color:#fc4700; font-size:15pt;">
                <?php
                if ($status == 0) {
                    echo "Rp. 0";
                } else {
                    echo "Rp. " . number_format($total, 0, ',', '.');
                }
                ?>
            </span>
        </h1>
        <?php
        if ($status != 0) {
            ?>
            <br>
            <a href="user/confirm.php?idUser=<?php echo $_SESSION['id'] ?>">
                <button class="btn btn-biru">
                    <i class="fas fa-arrow-right    "></i>
                    <span>Checkout</span>
                </button>
            </a>
        <?php
    }
    ?>
    </div>
</div>