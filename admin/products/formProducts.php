<?php
$method = $_GET['method'];
if ($method == 'add') {
    ?>
    <div class="card-header">
        <h3>
            <i class="fas fa-campground    "></i>
            <span>Add Products</span>
        </h3>
    </div>
    <form action="products/controllerProducts.php?act=store" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="var_name">Name</label>
            <input type="text" name="var_name" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_cat">Category</label>
            <select name="var_cat" class="form-input">
                <option selected>Choose a category</option>
                <?php
                $sql = "select * from categories";
                $q = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($q)) {
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-item">
            <label for="var_price">Price</label>
            <input type="number" name="var_price" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_stock">Stock</label>
            <input type="number" name="var_stock" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_desc">Description</label>
            <textarea name="var_desc" class="form-input"></textarea>
        </div>
        <div class="form-item">
            <label for="var_img">Image</label>
            <input type="file" name="var_img" class="form-input">
        </div>
        <div class="form-item">
            <button type="submit" class="btn btn-ijo">
                <i class="fas fa-plus    "></i>
                <span>Submit</span>
            </button>
        </div>
    </form>
<?php
} else {
    $id = $_GET['id'];
    $sql = "select * from products where id_products = '$id'";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="card-header">
            <h3>
                <i class="fas fa-campground    "></i>
                <span>Edit Products</span>
            </h3>
        </div>
        <form action="products/controllerProducts.php?act=update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="var_id" value="<?php echo $id ?>">
            <div class="form-item">
                <label for="var_name">Name</label>
                <input type="text" name="var_name" value="<?php echo $row[2] ?>" class="form-input">
            </div>
            <div class="form-item">
                <label for="var_cat">Category</label>
                <select name="var_cat" class="form-input">
                    <option selected>Choose a category</option>
                    <?php
                    $sql = "select * from categories";
                    $q = mysqli_query($con, $sql);
                    while ($rows = mysqli_fetch_array($q)) {
                        echo "<option value='$rows[0]'>$rows[1]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-item">
                <label for="var_price">Price</label>
                <input type="number" name="var_price" value="<?php echo $row[3] ?>" class="form-input">
            </div>
            <div class="form-item">
                <label for="var_stock">Stock</label>
                <input type="number" name="var_stock" value="<?php echo $row[4] ?>" class="form-input">
            </div>
            <div class="form-item"><label for="var_desc">Description</label>
                <textarea name="var_desc" class="form-input"><?php echo $row[5] ?></textarea>
            </div>
            <div class="form-item">
                <label for="var_img">Image</label>
                <input type="file" name="var_img" class="form-input">
            </div>
            <div class="form-item">
                <button type="submit" class="btn btn-kuning">
                    <i class="fas fa-edit    "></i>
                    <span>Submit</span>
                </button>
            </div>
        </form>
    <?php
}
}
?>