<?php include_once("header.php") ?>
<?php 
    if(isset($_SESSION['user'])!="")
        header("Location: index.php");
    require_once("./entities/user.class.php");

    if(isset($_POST['btn-signin']))
    {
        $u_name = $_POST['txtName'];
        $u_pass = $_POST['txtPass'];
        $result = User::checkLogin($u_name,$u_pass);
        if(!$result){
            ?>
            <script>alert('Đăng nhập thất bại');</script>
            <?php
        }else{
            $_SESSION['user'] =$u_name;
            header("Location: index.php");
        }
    }
?>
<form method="post" style="width:30%">
    <div class="form-group row">
        <label for="txtName" class="col-sm-2 form-control-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="txtName" placeholder="tài khoản">
        </div>
    </div>
    <div class="form-group row">
        <label for="txtPass" class="col-sm-2 form-control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="txtPass" placeholder="mật khẩu">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-signin" value="Đăng nhập">
        </div>
    </div>
</form>
<?php include_once("footer.php") ?>