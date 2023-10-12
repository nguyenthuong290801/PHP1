<div class="d-lg-flex half p-5">
    <div class="container w-50">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="mb-4">
                    <h3>Quên mật khẩu</h3>
                </div>
                <form action="" method="post">
                    <div class="form-group first my-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small class="text-danger"><?= isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : ''; ?></small>
                    </div>
                    <button typye="submit" class="button w-100">Gửi</button>
                </form>
            </div>
        </div>  
    </div>
</div>
<?php unset($_SESSION['error']); ?>