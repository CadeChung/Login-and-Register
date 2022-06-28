<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" 
          crossorigin="anonymous">
    
</head>

<body>
    <div class="containet d-flex justify-content-center 
        align-items-center"
        style="min-height: 100vh">
        <form class = "border shadow p-3 rounded"
              action="php/check_signup.php"
              method="post"
              style="width: 450px;">

              <h4 class = "text-center p-3">註冊</h4>

              <?php if (isset($_GET['error'])) { ?>
                </p><div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
              </div>
              <?php }?>

            <div class="mb-3">
                <label for="username"
                       class="form-label">帳號</label>
                <input type="text" 
                       class="form-control"
                       name = "username"
                       placeholder="輸入帳號:"
                       id="username"
                       value="<?php echo (isset($_GET['username']))?$_GET['username']:"" ?>">     
            </div>

            <div class="mb-3">
                <label for="passowrd" 
                       class="form-label">密碼</label>
                <input type="password" 
                       name = "password"
                       placeholder="輸入密碼:"
                       class="form-control" 
                       id="passowrd"
                       value="<?php echo (isset($_GET['passowrd']))?$_GET['passowrd']:"" ?>">
          
            </div>

            <div class="mb-3">
                <label for="re_passowrd" 
                       class="form-label">再一次輸入密碼</label>
                <input type="password" 
                       name = "re_password"
                       placeholder="再一次輸入密碼:"
                       class="form-control" 
                       id="passowrd"
                       value="<?php echo (isset($_GET['re_passowrd']))?$_GET['re_passowrd']:"" ?>">
            </div>

            <div class="mb-3">
                <label for="name" 
                       class="form-label">使用者名稱</label>
                <input type="text"
                       name = "name"
                       placeholder="請輸入使用者名稱:"
                       class="form-control" 
                       id="name"
                       value="<?php echo (isset($_GET['name']))?$_GET['name']:"" ?>">
            </div>

            <div class="mb-0">
                <label class="form-label">請選擇使用者權限:</label>
            </div>

            <select class="form-select mb-3"
                    name = "role" 
                    aria-label="Default select example">
                    <option selected value="user">User</option>
                    <option value="admin">Admin</option>
            </select>

            <button type="submit" 
                    class="btn btn-primary">註冊</button>
            <!-- Register buttons -->
            <div class="text-center">
                <a href="index.php">已經有帳號了?</a>
            </div>
        </form>
    </div>

</body>
</html>