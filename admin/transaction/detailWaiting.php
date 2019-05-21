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
        <tr>
            <thead>
                <th>Recipent</th>
                <th>Address</th>
                <th>Receipt Image</th>
            </thead>
        </tr>
        <?php
        $sqlShip = mysqli_query($con, "select * from shipment where id_trans = '$id'");
        $rowShip = mysqli_fetch_array($sqlShip);
        ?>
        <tr>
            <td>
                <?php echo $rowShip[2] . " - ( " . $rowShip[4] . " )" ?>
            </td>
            <td>
                <?php echo $rowShip[3] ?>
            </td>
            <td>
                <img src="../assets/img/receipt-img/<?php echo $idTrans[5] ?>">
            </td>
        </tr>
    </table>
</div>
<div class="cart-footer">
    <form action="transaction/confirmOrder.php" method="post">
        <input type="hidden" name="idTrans" value="<?php echo $idTrans[0] ?>">
        <button type="submit" class="btn btn-biru">
            <i class="fas fa-check    "></i>
            <span>Confirm Order</span>
        </button>
    </form>
</div>