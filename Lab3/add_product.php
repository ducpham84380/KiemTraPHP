<?php

require_once("./entities/product.class.php");
require_once("./entities/category.class.php");

if(isset($_POST["btnSubmit"])){
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtPrice"];
    $quantity = $_POST["txtQuantity"];
    $description = $_POST["txtDesc"];
    $picture = $_POST["txtPic"];

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
<?php include_once("./header.php"); ?>

<?php
    if(isset($_GET["inserted"])){
        echo "<h2>Thêm sản phẩm thành công</h2>";
    }
    ?>
<!-- #form sản phẩm -->
<form method="post">
    <!-- #Tên SP -->
    <div class="row">
        <div class="lblTitle">
            <label>Tên sản phẩm</label>
        </div>
        <div class="lblTitle">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>" />
        </div>
    </div>
    <!-- #mô tả sản phẩm -->
    <div class="row">
        <div class="lblTitle">
            <label>Mô tả sản phẩm</label>
        </div>
        <div class="lblInput">
            <textarea name="txtDesc" cols="21" rows="10" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : "" ; ?>"></textarea>
        </div>
    </div>
    <!-- #số lượng sản phẩm -->
    <div class="row">
        <div class="lblTitle">
            <label>Số lượng sản phẩm</label>
        </div>
        <div class="lblTitle">
            <input type="text" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : "" ; ?>" />
        </div>
    </div>
    <!-- #giá sản phẩm -->
    <div class="row">
        <div class="lblTitle">
            <label>Giá sản phẩm</label>
        </div>
        <div class="lblTitle">
            <input type="text" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : "" ; ?>" />
        </div>
    </div>
    <!-- #loại sản phẩm -->
    <div class="row">
        <div class="lblTitle">
            <label>Chọn loại sản phẩm</label>
        </div>
        <div class="lblInput">
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
        <div class="lblTitle">
            <label>Đường dẫn hình</label>
        </div>
        <div class="lblInput">
            <input type="file" id="txtPic" name="txtPic" accept=".PNG,.GIF,.JPG">
        </div>
    </div>
    <!-- #nút gửi form -->
    <div class="row">
        <div class="btnSubmit">
            <input type="submit" name="btnSubmit" value=" Thêm sản phẩm " />
        </div>
    </div>
</form>