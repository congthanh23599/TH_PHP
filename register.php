<?php include_once("header.php") ?>
<?php 
    if(isset($_SESSION['user'])!="")
        header("Location: index.php");
    require_once("./entities/user.class.php");

    if(isset($_POST['btn-signup']))
    {
        $u_name = $_POST['txtName'];
        $u_email = $_POST['txtEmail'];
        $u_pass = $_POST['txtPass'];
        $account = new User($u_name,$u_pass,$u_email);
        $result =$account->save();
        if(!$result){
            ?>
            <script>alert('Có lỗi xảy ra, vui lòng  kiểm tra dữ liệu');</script>
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
        <label for="txtEmail" class="col-sm-2 form-control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="txtEmail" placeholder="email">
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
            <input type="submit" name="btn-signup" value="Đăng ký">
        </div>
    </div>
</form>
<?php include_once("footer.php") ?>