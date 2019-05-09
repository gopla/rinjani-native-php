<a href="index.php?menu=users&&method=add">
    <button class="btn btn-ijo">
        <i class="fas fa-plus    "></i>
        <span>Add Data</span>
    </button>
</a>
<table class="table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Role</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "select * from users");
        $no = 0;
        while ($row = mysqli_fetch_array($query)) {
            $no++;
            echo "
                    <tr>
                        <td>
                            $no
                        </td>
                        <td>
                            $row[1]
                        </td>
                        <td>
                            $row[2]
                        </td>
                        <td>
                            $row[3]
                        </td>
                        <td>
                            $row[5]
                        </td>
                        <td>
                            <a href='users/controllerUsers.php?act=delete&&id=$row[0]'>
                                <button class='btn btn-abang'>
                                    <i class='fas fa-trash'></i>
                                </button>
                            </a>

                            <a href='index.php?menu=users&&method=edit&&id=$row[0]'>
                                <button class='btn btn-kuning'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                ";
        }
        ?>
    </tbody>
</table>