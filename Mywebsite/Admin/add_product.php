<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php $conn=new mysqli("localhost","root","","mydatabase") ?>
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input class="form-control" name="name" type="text" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
              <label for="priceproduct">Giá sản phẩm</label>
              <input type="number" name="price" id="priceproduct" class="form-control">
            </div>
            <div class="form-group">
              <label for="des">Mô tả của sản phẩm</label>
              <input name="des" type="text" id="des" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Loại sản phẩm</label>
                <select name="category">
                    <?php 
                        $result=$conn->query("select * from category");
                        while($row=$result->fetch_array()){
                            $catId=$row["CategoryID"];
                            $catName=$row["CategoryName"];
                            echo "<option value='$catId'>$catName</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="img">Ảnh của sản phẩm </label>
                <input type="file" name="image" id="">
            </div>
            <button name="submit" type="submit" class="form-control btn btn-primary">Thêm</button>
            
            </form>
        </div>
    </div>
                <?php
                session_start();
                if(isset($_POST['submit'])){
                    $product_name=$_POST['name'];
                    $product_price=$_POST['price'];
                    $product_des=$_POST['des'];
                    $cat=$_POST['category'];
                    // get img
                    $product_image=$_FILES['image']['name'];
                    $target="../img/".basename($product_image);
                    $resulttarget="img/".basename($product_image);
                        $result2=$conn->query("INSERT INTO `product`(`ProductName`, `ProductPrice`, `ProductDescription`, `ProductImage`, `CategoryID`) VALUES('$product_name','$product_price','$product_des','$resulttarget','$cat')");
                        move_uploaded_file($_FILES['image']['tmp_name'],$target);
                        if($result2){
                            echo "<script>alert('THêm thành công')</script>";
                            header("location:view_product.php");
                        }
                        else{
                            echo "<script>alert('THêm thất bại')</script>";
                            header("location:add_product.php");
                        }
                }
           



?>
</body>
</html>