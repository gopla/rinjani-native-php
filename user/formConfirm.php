<div class="card" style="margin-top:7%; width:80%; margin-left:10%;">
    <div class="card-header">
        <h1>
            <i class="fas fa-money-bill    "></i>
            <span>Checkout</span>
        </h1>
    </div>
    <form action="user/confirm.php" method="post">
        <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>">
        <div class="form-item">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" class="form-input">
        </div>
        <div class="form-item">
            <label for="address">Address</label>
            <textarea name="address" class="form-input"></textarea>
        </div>
        <div class="form-item">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-input">
        </div>
        <button class="btn btn-ijo" style="margin-top:2%;">
            <i class="fas fa-check    "></i>
            <span>Confirm and Buy</span>
        </button>
    </form>
</div>