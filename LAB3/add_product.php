<?php

require_once("./entities/product.class.php");
require_once("./entities/category.class.php");

if(isset($_POST["btnsubmit"])){
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_POST["txtpic"];

    $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

    $result = $newProduct->save();
    if(!$result)
    {
        header("Location: add_product.php?failure");
    }
    else {
        header("Location: add_product.php?inserted");
    }
}
?>
<?php include_once("header.php"); ?>

<?php
    if(isset($_GET["inserted"])){
        echo "<h2>Thêm sản phẩm thành công</h2>";
    }
    ?>
<!-- #form sản phẩm -->
<form method="post" enctype="multipart/form-data">
    <!-- #Tên SP -->
    <div class="row">
        <div class="lbltitle">
            <label>Tên sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>" />
        </div>
    </div>
    <!-- #mô tả sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label>Mô tả sản phẩm</label>
        </div>
        <div class="lblinput">
            <textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?>"></textarea>
        </div>
    </div>
    <!-- #số lượng sản phẩm -->
    <div class="row">
        <div class="lbtitle"></div>
        <lable>Số lượng sản phẩm</lable>
        <div>
            <div class="lbtinput">
                <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"])? $_POST["txtquantity"]:"";?>"/>
            </div>
        </div>
    <!-- #giá sản phẩm -->
    <div class="row">
        <div class="lbtitle"></div>
            <lable>Gia ban</lable>
            <div>
                <div class="lbtinput">
                    <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"])? $_POST["txtprice"]:"";?>"/>
         </div>
    </div>
    <!-- #loại sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label>Chọn loại sản phẩm</label>
        </div>
        <div class="lblinput">
            <select name="txtCateID">
                <option value="" selected>--Chọn Loại--</option>
                <?php
                    $cates = Category::list_category();
                    foreach ($cates as $item) {
                        echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                    }
                    ?>
            </select>
        </div>
    </div>
    <!-- #hình ảnh -->
    <div class="row">
        <div class="lbltitle">
            <label>Đường dẫn hình</label>
        </div>
        <div class="lblinput">
            <input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG">
        </div>
    </div>
    <!-- #nút gửi form -->
    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm sản phẩm" />
        </div>
    </div>
</form>