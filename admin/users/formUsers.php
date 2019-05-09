<?php
$method = $_GET['method'];
if ($method == 'add') {
    ?>
    <div class="card-header">
        <h3>
            <i class="fas fa-user    "></i>
            <span>Add User</span>
        </h3>
    </div>
    <form action="users/controllerUsers.php?act=store" method="post">
        <div class="form-item">
            <label for="var_name">Name</label>
            <input type="text" name="var_name" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_email">Email</label>
            <input type="email" name="var_email" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_user">Username</label>
            <input type="text" name="var_user" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_pass">Password</label>
            <input type="password" name="var_pass" class="form-input">
        </div>
        <div class="form-item">
            <label for="var_role">Role</label>
            <select name="var_role" class="form-input">
                <option value="user" selected> -> Select a role</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
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
    $sql = "select * from users where id_user = '$id'";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="card-header">
            <h3>
                <i class="fas fa-user    "></i>
                <span>Edit User</span>
            </h3>
        </div>
        <form action="users/controllerUsers.php?act=update" method="post">
            <input type="hidden" name="var_id" value="<?php echo $id ?>">
            <div class="form-item">
                <label for="var_name">Name</label>
                <input type="text" name="var_name" value="<?php echo $row[1] ?>" class="form-input">
            </div>
            <div class="form-item">
                <label for="var_email">Email</label>
                <input type="email" name="var_email" value="<?php echo $row[2] ?>" class="form-input">
            </div>
            <div class="form-item">
                <label for="var_user">Username</label>
                <input type="text" name="var_user" value="<?php echo $row[3] ?>" class="form-input">
            </div>
            <div class="form-item">
                <label for="var_pass">Password</label>
                <input type="text" name="var_pass" class="form-input">
            </div>
            <div class="form-item">
                <label for="var_role">Role</label>
                <select name="var_role" class="form-input">
                    <option value="user"> -> Select a role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
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
</body>

</html>