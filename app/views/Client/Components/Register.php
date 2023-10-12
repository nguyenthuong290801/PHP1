<div class="d-lg-flex half p-5">
    <div class="container w-50">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="mb-4">
                    <h3>Đăng ký</h3>
                </div>
                <form action="" method="post">
                    <div class="form-group first my-3">
                        <label for="username">Họ và tên</label>
                        <input type="text" class="form-control" id="username" name="username">
                        <small class="text-danger"><?= isset($_SESSION['error']['username']) ? $_SESSION['error']['username'] : ''; ?></small>
                    </div>
                    <div class="form-group first my-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small class="text-danger"><?= isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : ''; ?></small>
                    </div>
                    <div class="form-group last mb-3">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="text-danger"><?= isset($_SESSION['error']['password']) ? $_SESSION['error']['password'] : ''; ?></small>
                    </div>
                    <button typye="submit" class="button w-100 mt-5" name="register">Đăng ký</button>
                    <div class="row text-center mt-3">
                        <div class="col">
                            <small class="text-danger"><?= isset($_SESSION['error']['register']) ? $_SESSION['error']['register'] : ''; ?></small>
                            <small class="text-success"><?= isset($_SESSION['success']['register']) ? $_SESSION['success']['register'] : ''; ?></small>
                        </div>
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col">
                            <p>Nếu bạn đã có tài khoản hãy <a class="text-orange" href="Login">Đăng nhâp!</a></p>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php unset($_SESSION['error']); ?>