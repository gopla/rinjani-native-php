<div class="card" style="margin-top:7%; width:80%; margin-left:10%;">
    <div class="card-header">
        <h2>
            <i class="fas fa-money-check-alt    "></i>
            <span>Transaction History</span>
        </h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Transactions Date</th>
                <th>Grandtotal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        require_once "config/connect.php";

        $idUser = $_SESSION['id'];
        $sqlCheckTrans = mysqli_query($con, "select * from transactions where id_user = '$idUser'");
        while ($rowCheckTrans = mysqli_fetch_array($sqlCheckTrans)) {
            ?>
            <tr>
                <td>
                    <?php echo $rowCheckTrans[1] ?>
                </td>
                <td>
                    Rp. <?php echo number_format($rowCheckTrans[3], 0, ',', '.') ?>
                </td>
                <td>
                    <?php
                    if ($rowCheckTrans[4] == 1) {
                        echo "Waiting for payment";
                    } else if ($rowCheckTrans[4] == 0) {
                        echo "Shipped :)";
                    } else {
                        echo "Wait for confirm";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($rowCheckTrans[4] != 1) {
                        echo "none";
                    } else {
                        ?>
                        <a href="index.php?menu=checkout" class="btn btn-biru">
                            <i class="fas fa-money-bill-wave-alt    "></i>
                            <span>Upload Receipt</span>
                        </a>
                    <?php } ?>
                </td>
            </tr>
        <?php
    }
    ?>
    </table>
</div>