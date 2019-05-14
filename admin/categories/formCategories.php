<?php
$method = $_GET['method'];
if ($method == 'add') {
    ?>
    <div class="card-header">
        <h3>
            <i class="fas fa-list    "></i>
            <span>Add Categories</span>
        </h3>
    </div>
    <form action="categories/controllerCategories.php?act=store" method="post">
        <div class="form-item">
            <label for="var_name">Name</label>
            <input type="text" name="var_name" class="form-input" required>
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
    $sql = "select * from categories where id_categories = '$id'";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="card-header">
            <h3>
                <i class="fas fa-user    "></i>
                <span>Edit Categories</span>
            </h3>
        </div>
        <form action="categories/controllerCategories.php?act=update" method="post">
            <input type="hidden" name="var_id" value="<?php echo $id ?>">
            <div class="form-item">
                <label for="var_name">Name</label>
                <input type="text" name="var_name" value="<?php echo $row[1] ?>" class="form-input" required>
            </div>
            <div class="form-item">
                <button type="submit" class="btn btn-ijo">
                    <i class="fas fa-edit    "></i>
                    <span>Submit</span>
                </button>
            </div>
        </form>
    <?php
}
}
?>
</body>

</html>