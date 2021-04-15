<?php 
    require_once("./entities/product.class.php");
    require_once("./entities/category.class.php");
?>
<?php 
    include_once("header.php");
    if(!isset($_GET["cateid"])){
        $prods = Product::list_product();
    }else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_category();


    $conn =new mysqli("localhost","root","123456","ecommerce");
    $result = mysqli_query($conn, 'select count(ProductID) as total from product');
          $row =mysqli_fetch_assoc($result);
          $total_records = $row['total'];
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $limit = 1;

          $total_page = ceil($total_records / $limit);

          if($current_page>$total_page){
              $current_page = $total_page;
          }
          else if($current_page<1){
              $current_page=1;
          }
          $start = ($current_page -1) * $limit;
          $result = mysqli_query($conn,"SELECT * FROM product LIMIT $start,$limit");
  
    
?>
<div class="container text-center">
    <!-- <div class="col-sm-3"> -->
    <div class="col-sm-3 panel panel-primary">
    <h3 class="panel-heading">Danh mục</h3><br>
    <ul class="list-group">
        <?php 
            foreach ($cates as $item) {
                echo "<li class='list-group-item'>
                      <a href=/THCC/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
            }
        ?>
    </ul>
    </div>
    <div class="col-sm-9"> 
    <h3>Sản phẩm cửa hàng</h3><br>

    
        <div class="row">
            <?php
                while( $row =mysqli_fetch_assoc($result)){
                ?>
                <div class="col-sm-4">
                    <a href="/THCC/product_detail.php?id=<?php echo $row["ProductID"];?>">
                        <img src="<?php echo "/THCC/".$row["Picture"];?>" class="img-responsive" style="width=100%" alt="Image">
                    </a>
                    <p class="text-danger"><?php echo $row["ProductName"];?></p>
                    <p class="text-info"><?php echo $row["Price"];?></p>
                    <p>
                        <button type="button" class="btn btn-primary" onclick="location.href='/THCC/shopping_cart.php?id=<?php echo $row['ProductID'];?>'" >Mua hàng</button>
                    </p>
                </div>
                <?php } ?>
        </div>
    </div>  
   <?php 
   if($current_page > 1 && $total_page > 1){
       echo '<a href="list_product.php?page='.($current_page-1).'">prev</a>|';}
       for ($i=1; $i<= $total_page;$i++){
           if($i == $current_page){
               echo'<span>'.$i.'</span> | ';
           }
           else{
               echo '<a href="list_product.php?page='.$i.'">'.$i.'</a> |';
           }
       }
       if($current_page < $total_page && $total_page >1){
           echo '<a href="list_product.php?page='.($current_page+1).'">next</a> | ';
       }
       ?>
</div>
<?php include_once("footer.php") ?>