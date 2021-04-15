<?php
require_once("./config/db.class.php");

class Product
{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture)
    {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    //lưu sản phẩm
    public function save()
    {
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this->picture['name'];
        $timestamp= date("Y").date("m").date("d").date("h").date("i").date("s");
        $filepath= "uploads/".$timestamp.$user_file;
        if(move_uploaded_file($file_temp,$filepath)==false){
            // return false;
        }

        $db = new Db();
        //thêm product vào CSDL
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Descriptions, Picture) VALUES
        ('$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$filepath')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_product(){
        $db = new Db();
        $sql="SELECT * FROM product";
        $result=$db->select_to_array($sql);
        return $result;
    }

    
    public static function list_product_by_cateid($cate_id){
        $db = new Db();
        $sql="SELECT * FROM product WHERE CateID='$cate_id'" ;
        $result=$db->select_to_array($sql);
        return $result;
    }

    public static function list_product_by_relate($cate_id, $id){
        $db = new Db();
        $sql="SELECT * FROM product WHERE CateID='$cate_id'AND productID!='$id'" ;
        $result=$db->select_to_array($sql);
        return $result;
    }
    public static function get_product($id){
        $db = new Db();
        $sql="SELECT * FROM product WHERE productID='$id'" ;
        $result=$db->select_to_array($sql);
        return $result;
    }
}
?>