<?php 
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");

    if(isset($_POST["btnSubmit"])){
       
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtPrice"];
        $quantity = $_POST["txtQuantity"];
        $description = $_POST["txtDesc"];
        $picture = $_FILES["txtPicture"];
       
        $newProduct = new Product($productName,$cateID,$price,$quantity,$description,$picture);
    
        $result = $newProduct->save();
        if(!$result){
            header("Location: add_product.php?failure");
        }
        else{
            header("Location: add_product.php?inserted");
        }
    }
?>
<?php include_once"header.php";?>


<form enctype="multipart/form-data" method="post">

    <div class="row">
        <div class="lbltitle">
            <label for="">Tên sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "";?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="">Mô tả sản phẩm</label>
        </div>
        <div class="lblinput">
            <textarea type="text" name="txtDesc" 
            row="10" col="21" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : "";?>"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="">Số lượng sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : "";?>">
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label for="">Giá sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : "";?>">
        </div>
    </div>   
 
    <div class="row">
        <div class="lbltitle">
            <label>Loại sản phẩm</label>
        </div>
        <div class="lblinput">
            <select name="txtCateID">
                <option value="" selected>--Chọn loại--</option>
                <?php 
                    $cates = Category::list_category();
                    foreach ($cates as $item){
                        echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";  
                    }                   
                ?>
            </select>
        </div>
    </div>

   <div class="row">
        <div class="lbltitle">
            <label for="">Đường dẫn ảnh</label>
        </div>
        <div class="lblinput">
            <input type="file" id="txtPicture" name="txtPicture" accept=".PNG,.GIF,.JPG">
        </div>
    </div>

    <div class="row">
        <div class="submit">
            <input type="submit" name="btnSubmit" value="Thêm sản phẩm">
        </div>
    </div>
</form>

<?php include_once("footer.php"); ?>