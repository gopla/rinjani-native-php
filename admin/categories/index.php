<a href="index.php?menu=categories&&method=add">
    <button class="btn btn-ijo">
        <i class="fas fa-plus    "></i>
        <span>Add Data</span>
    </button>
</a>
<table class="table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "select * from categories");
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
                            <a href='categories/controllerCategories.php?act=delete&&id=$row[0]'>
                                <button class='btn btn-abang'>
                                    <i class='fas fa-trash'></i>
                                </button>
                            </a>

                            <a href='index.php?menu=categories&&method=edit&&id=$row[0]'>
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