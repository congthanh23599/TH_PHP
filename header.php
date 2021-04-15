<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="nguyencongthanh">
    <link href="/THCC/site.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <title>Project training - website bán hàng PHP</title>

    <script src="cdnjs/jquery-1.10.2.min.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href = "jquery-ui-1.12.1/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
   
<div id="wrapper">
        <h2>xây dựng website bán hàng PHP<h2>
        <?php 
            session_start();
            if(isset($_SESSION['user'])!=""){
                echo "<h2>Xin chào ".$_SESSION['user']."<a href='/THCC/logout.php'>Logout</a></h2>";
            }else{
                echo "<h2>Bạn chưa đăng nhập <a href='/THCC/login.php'>Đăng nhập</a> - <a href='/THCC/register.php'>Đăng ký</a></h2>";
            }
        ?>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/THCC/list_product.php">Danh sách sản phẩm</a>
                    <a class="navbar-brand" href="/THCC/add_product.php">Thêm sản phẩm</a>
                </div>
            </div>
        </div>