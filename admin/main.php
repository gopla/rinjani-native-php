<div class="card-header">
    <h2>
        <i class="fas fa-tachometer-alt    "></i>
        <span>Dashboard</span>
    </h2>
</div>
<div class="mini-card-container">
    <div class=" mini-card btn-biru">
        <h4>Users</h4>
        <i class="fas fa-user    "></i>
        <span>
            <?php
            include_once "../config/connect.php";
            $sql = "select count(id_user) from users where role = 'user'";
            $q = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($q);
            echo $row[0]
            ?>
        </span>
    </div>
    <div class="mini-card btn-abang">
        <h4>Products</h4>
        <i class="fas fa-campground    "></i>
        <span>
            <?php
            $sql = "select count(id_products) from products";
            $q = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($q);
            echo $row[0]
            ?>
        </span>
    </div>
    <div class="mini-card btn-kuning">
        <h4>Categories</h4>
        <i class="fas fa-bars    "></i>
        <span>
            <?php
            $sql = "select count(id_categories) from categories";
            $q = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($q);
            echo $row[0]
            ?>
        </span>
    </div>
    <div class="mini-card btn-ijo">
        <h4>Total Transaction</h4>
        <i class="fas fa-cart-plus    "></i>
        <span>
            <?php
            $sql = "select count(id_trans) from transactions";
            $q = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($q);
            echo $row[0]
            ?>
        </span>
    </div>
</div>