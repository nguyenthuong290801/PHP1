<div class="d-lg-flex half p-5">
  <div class="container w-50">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7">
        <div class="mb-4">
          <h3>Đăng nhập</h3>
        </div>
        <form action="" method="post">
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
          <div class="d-flex mb-5 align-items-center justify-content-between">
            <label class="control control--checkbox mb-0"><span class="caption">Nhớ tài khoản</span>
              <input class="form-check-input" type="checkbox" checked="checked">
              <div class="control__indicator"></div>
            </label>
            <span class="ml-auto"><a href="QualityPassword" class="forgot-pass text-orange">Quên mật khẩu</a></span>
          </div>
          <button typye="submit" class="button w-100" name="login">Đăng nhập</button>
          <div class="row mt-3">
            <div class="col">
              <small class="text-danger"><?= isset($_SESSION['error']['login']) ? $_SESSION['error']['login'] : ''; ?></small>
            </div>
          </div>

          <div class="row text-center mt-5">
            <div class="col">
              <p>Nếu bạn chưa có tài khoản hãy <a class="text-orange" href="Register">Đăng ký!</a></p>

            </div>
          </div>

          <!-- <span class="d-block text-center my-4 text-muted">&mdash; hoặc &mdash;</span>

          <div class="social-login">
            <a href="#" class="facebook btn d-flex justify-content-center align-items-center bg-primary text-light my-3 rounded-pill">
              <span class="icon-facebook mr-3"></span> Đăng nhập với Facebook
            </a>
            <a href="#" class="google btn d-flex justify-content-center align-items-center bg-danger text-light rounded-pill">
              <span class="icon-google mr-3"></span> Đăng nhập với Google
            </a>
          </div> -->
        </form>
      </div>
    </div>
  </div>
</div>
<?php unset($_SESSION['error']); ?>