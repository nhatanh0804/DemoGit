<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="container">
        <div class="row">
        <?php
        $conn = new mysqli("localhost","root","","mydatabase");
             if(isset($_GET['id'])){
        $id=$_GET['id'];
        $data=$conn->query("select * from product where ProductID='$id'");
        while($row=$data->fetch_array()){
            $product_name=$row['ProductName'];
            $product_price=$row['ProductPrice'];
            $product_des=$row['ProductDescription'];
            $img=$row['ProductImage'];
        }
    }
    ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input class="form-control" name="name" type="text" placeholder="Nhập tên sản phẩm" value="<?php echo $product_name ?>">
            </div>
            <div class="form-group">
              <label for="priceproduct">Giá sản phẩm</label>
              <input type="text" name="price" id="priceproduct" class="form-control" value="<?php echo $product_price ?>">
            </div>
            <div class="form-group">
              <label for="des">Mô tả của sản phẩm</label>
              <input name="des" type="text" id="des" class="form-control" value="<?php echo $product_des?>">
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
                <label for="img">Ảnh của sản phẩm : <img src="<?php echo "../$img"?>" alt="Không tìm thấy ảnh" width="50" height="30"> </label>
            </div>
            <button name="submit" type="submit" class="form-control btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>
<?php
if(isset($_POST['submit'])){

  $product_name=$_POST['name'];
  $product_price=$_POST['price'];
  $product_des=$_POST['des'];
  $cat=$_POST['category'];
  // get img
  $product_image=$_FILES['image']['name'];
  $target="../img/".basename($product_image);
  $resulttarget="img/".basename($product_image);
    $ProductID=$_GET['id'];
    $result2=$conn->query("UPDATE `product` SET `ProductName`='$product_name',`ProductPrice`='$product_price',`ProductDescription`='$product_price',`CategoryID`='$cat' WHERE ProductID='$ProductID'");
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    if($result2){
      echo "<script>alert('Thay đổi dữ liệu thành công')</script>";
      header("location: view_product.php");
    }
    else{
        echo "<script>alert('Thay đổi dữ liệu thất bại')</script>";
        header("location: edit.php");
    }
}
?>
</body>
</html>