<div class="card-header">
    <h3>
        <i class="fas fa-campground    "></i>
        <span>Products</span>
    </h3>
</div>
<a href="index.php?menu=products&&method=add">
    <button class="btn btn-ijo">
        <i class="fas fa-plus    "></i>
        <span>Add Data</span>
    </button>
</a>
<table class="table" border="0">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "select * from products");
        $no = 0;
        while ($row = mysqli_fetch_array($query)) {
            $cat_query = mysqli_query($con, "select * from categories where id_categories = '$row[1]'");
            $cat_name = mysqli_fetch_array($cat_query);
            $no++;
            $harga = number_format($row[3]);
            echo "
                        <tr>
                            <td>
                                $no
                            </td>
                            <td style='width:250px'>
                                $row[2]
                            </td>
                            <td>
                                $cat_name[1]
                            </td>
                            <td>
                                Rp. $harga
                            </td>
                            <td>
                                $row[4]
                            </td>
                            <td>
                                <img src='../assets/img/products-img/$row[6]'>
                            </td>
                            <td>
                                <a href='products/controllerProducts.php?act=delete&&id=$row[0]'>
                                    <button class='btn btn-abang'>
                                        <i class='fas fa-trash'></i>
                                    </button>
                                </a>
                                
                                <a href='index.php?menu=products&&method=edit&&id=$row[0]'>
                                    <button class='btn btn-kuning'>
                                        <i class='fas fa-edit'></i>
                                    </button>
                                </a>

                                <a href='index.php?menu=products&&method=show&&id=$row[0]'>
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