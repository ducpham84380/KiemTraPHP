<?php

require_once("./entities/product.class.php");

?>
<?php
    include_once("./header.php");
    $prods = Product::list_product();

    foreach ($prods as $item) {
        echo "<p>tên sản phẩm".$item["ProductName"]."</p>";
    }
    include_once("./footer.php");
?>