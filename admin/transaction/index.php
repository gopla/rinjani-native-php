<div class="card-header">
    <h3>
        <i class="fas fa-piggy-bank    "></i>
        <span>Transactions</span>
    </h3>
</div>
<table class="table">
    <thead>
        <th>#</th>
        <th>Date</th>
        <th>Username</th>
        <th>Grandtotal</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "select * from transactions");
        $no = 0;
        while ($row = mysqli_fetch_array($query)) {
            $no++;
            $sqlUname = mysqli_query($con, "select username from users where id_user = '$row[2]'");
            $uname = mysqli_fetch_array($sqlUname);
            echo "
                    <tr>
                        <td>
                            $no
                        </td>
                        <td>
                            $row[1]
                        </td>
                        <td>
                            $uname[0]
                        </td>
                        <td>
                            Rp. " . number_format($row[3], 0, '.', '.') . "
                        </td>
                        <td>
                            <a href='index.php?menu=transactions&&method=show&&id=$row[0]'>
                                <button class='btn btn-biru'>
                                    <i class='fas fa-eye'></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                ";
        }
        ?>
    </tbody>
</table>