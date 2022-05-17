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
        $data=$conn->query("select * from category where CategoryID='$id'");
        while($row=$data->fetch_array()){
            $catID=$row['CategoryID'];
            $catname=$row['CategoryName'];
           
          
        }
    }
    ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="CategoryName">Tên danh mục</label>
                <input class="form-control" name="CategoryName" type="text" placeholder="Nhập tên danh mục" value="<?php echo $catname ?>">
            </div>
            <div class="form-group">
              <label for="catID">Category ID</label>
              <input type="text" name="CategoryID" id="CategoryID" class="form-control" value="<?php echo $catID ?>">
            </div>
            
                
            
            
            <button name="submit" type="submit" class="form-control btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>
<?php
if(isset($_POST['submit'])){

  $catname=$_POST['name'];
 
  $catID=$_GET['id'];
    $result2=$conn->query("UPDATE `category` SET `CategoryID`='$catID',`CategoryName`='$catname' Where CategoryID='$catID'");
  
    if($result2){
      echo "<script>alert('Thay đổi dữ liệu thành công')</script>";
      header("location: view_category.php");
    }
    else{
        echo "<script>alert('Thay đổi dữ liệu thất bại')</script>";
        header("location: editcat.php");
    }
}
?>
</body>
</html>