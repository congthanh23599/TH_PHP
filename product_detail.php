<?php
require_once("./entities/product.class.php");
require_once("./entities/category.class.php");
?>

<?php
include_once("./header.php");
if(!isset($_GET["id"])){

    header('Location: not_found.php');
}
else{
    $id =$_GET["id"];
    $prod = reset(Product::get_product($id));
    $prods_relate = Product::list_product_by_relate($prod["CateID"],$id);
}
$cates = Category::list_category();
?>
<div class="container text-center">
<div class="col-sm-3 panel panel-primary">
    <h3 class="panel-heading">Danh mục</h3><br>
    <ul class ="list-group">
        <?php foreach($cates as $item){
           echo"<li class ='list-group-item'><a href=/THCC/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";}
?>
    </ul>
    </div>
    <div class="col-sm-9 panel panel-info">
    <h3 class="panel-heading">Chi tiet San pham </h3><br>
    <div class="row">
    <div class="col-sm-6">
                <img src="<?php echo "/THCC/".$prod["Picture"];?>"  class="img-responsive" style="width: 100%;" alt="Image">
                </div>
        <?php 
      
            ?>
            <div class="col-sm-6">
               <div style="padding-left:10px">
               <h3 class="text-info">
               <?php echo $prod["ProductName"];?></h3>
                <p>gia:<?php echo $prod["Price"]; ?> </p>
                <p><?php echo $prod["Descriptions"];?></p>
                <p>
                    <button type="button" onclick="location.href='/THCC/shopping_cart.php?id=<?php echo $prods['ProductID'];?>'" class="btn btn-danger">Mua hàng</button>
                </p>
            </div>
            </div>
            <?php 
            ?>
    </div>
<h3 class="panel-heading">San pham lien quan</h3>
<div class="row">
<?php 
 foreach ($prods_relate as $item)
  {
    ?>
    <div class="col-sm-4">
        <a href="/THCC/product_detail.php?id=<?php echo $item["ProductID"];?>">
        <img src="<?php echo "/THCC/".$prod["Picture"];?>"  class="img-responsive" style="width: 100%;" alt="Image">
    </a>
        <p class="text-danger"><?php echo $item["ProductName"]; ?> </p>
        <p class="text-info"><?php echo $item["Price"]; ?> </p>
        <p>
            <button type="button"onclick="location.href='/THCC/shopping_cart.php?id=<?php echo $item['ProductID'];?>'" class="btn btn-danger">Mua hàng</button>
        </p>
        </div>
    <?php }?>
        </div>
        </div>
        </div>
