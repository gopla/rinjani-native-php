<?php
$id = $_GET['id'];

$sqlTrans = mysqli_query($con, "select * from transactions where id_trans = '$id'");
$idTrans = mysqli_fetch_array($sqlTrans);

$sqlUname = mysqli_query($con, "select username from users where id_user = '$idTrans[2]'");
$uname = mysqli_fetch_array($sqlUname);
?>

<div class="card-header">
    <h3>
        <i class="fas fa-user    "></i>
        <span><?php echo $uname[0] ?>'s Transaction at <?php echo $idTrans[1] ?></span>
    </h3>
</div>

<div class="detail-container">
    <table class="table">
        <?php
        $sql = "select * from transactions_detail where id_trans = '$id'";
        $q = mysqli_query($con, $sql);
        $no = 0;
        $total = 0;

        while ($row = mysqli_fetch_array($q)) {
            $no++;
            $sqlProduct = mysqli_query($con, "select * from products where id_products = '$row[1]'");
            $rowProducts = mysqli_fetch_array($sqlProduct);
            $sub  = $row[2] * $row[3];
            echo "
                <tr>
                    <td>
                        $no
                    </td>
                    <td>
                        $rowProducts[2]
                    </td>
                    <td>
                        Rp. " . number_format($row[2], 0, ',', '.') . "
                    </td>
                    <td>
                        X $row[3]
                    </td>
                    <td>
                        Rp. " . number_format($row[4], 0, ',', '.') . "
                    </td>
                </tr>
            ";
            $total += $sub;
        }
        ?>
    </table>
</div>
<div class="cart-footer">
    <h1>
        <span style="float:left; color:#fc4700; font-size:15pt;">
            Total :
        </span>
        <span style="float:right; color:#fc4700; font-size:15pt;">
            <?php echo "Rp. " . number_format($total, 0, ',', '.'); ?>
        </span>
    </h1>
    <br><br>
    <h3>
        <i class="fas fa-map-marker-alt    "></i>
        <span>Shipped to :</span>
    </h3>
    <?php
    $sqlShipment = mysqli_query($con, "select * from shipment where id_trans = '$id'");

    $showShipment = mysqli_fetch_array($sqlShipment);
    ?>
    <br>
    <p>
        <?php echo $showShipment[2] . "  -  (" . $showShipment[4] . ")"; ?>
    </p>
    <p>
        @ <?php echo $showShipment[3]; ?>
    </p>

</div>