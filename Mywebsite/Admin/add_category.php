<!DOCTYPE html>
<html>
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
                <label for="name">Tên danh mục</label>
                <input class="form-control" name="name" type="text" placeholder="Nhập tên danh mục">
            </div>
            <button name="submit" type="submit" class="form-control btn btn-primary">Thêm</button>
            
            
            </form>
        </div>
    </div>
                <?php
                session_start();
                if(isset($_POST['submit'])){
                    $cat_name=$_POST['name'];
                    
                        $result2=$conn->query("INSERT INTO `category`(`CategoryName`) VALUES('$cat_name')");
                        
                        if($result2){
                            echo "<script>alert('THêm thành công')</script>";
                            header("location:view_category.php");
                        }
                        else{
                            echo "<script>alert('THêm thất bại')</script>";
                            header("location:add_category.php");
                        }
                }
           



?>
	
</form>
</body>
</html>