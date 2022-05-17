<!DOCTYPE html>
<html lang="en">
<<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		#horizontal li{
        display: inline;
        list-style: none;
        padding: 10px;	
        list-style-type: none;
        text-align: center;
	    text-decoration: none;
		text-decoration-color: #F8F8F8;
		}
		
		
		
		.wrapper{
			width: 1400px;
			height: auto;
			margin: auto;
		}
		.header{
			height: 100px;
			margin: auto;
			
		}
		.logo {
			float:left;
			width: 150px;
			padding: 10px

		}
		.form_search{
			margin-top:10px;

		}
		.form_search input[type=text]{width: 250px; height: 30px}
		.form_search input[type=submit]{height: 30px}
		.login{
			float: right;
			right:30px;
			height:35px;
			line-height:35px;
			
			cursor:pointer;
			position:relative;
			display:inline;
			
		}
		.login a{
			text-decoration: none;	

		}

.register{
	float: right;
			margin-right: 50px;
			height:35px;
			line-height:35px;
			color:gray;
			cursor:pointer;
			position:relative;
			display:inline;
			
		}
	
		.register a{
			text-decoration: none;	

		}
		.menu{	
			width: 100%		
			height: 30px;
			background: #AB84BD;
			border: 1px solid black
		}
		.menu ul li{
			list-style: none;
			text-align: center;
			display: inline-table;
		}
		.menu ul li a{
			text-decoration: none;
			font-size: 16px;
			margin: 30px;
			padding: 5px;
			text-transform: uppercase;
		}
		.content{
			width: 100%;
			height: 1000px;
			border: 1px solid black
		}
		.left{
			width: 20%;
			background: #ffbb00;
			height: 1000px;
			float: left;
			list-style: none;
			display: block;
			text-align: center;
			
			
			
		}
		.right{
			width: 80%;
			
			height: 300px;
			float:right;
		}
		.footer{
			width: 100%;
			height: 100px;
			background: #ff7f00;
			border: 1px solid black
		}
		#sanpham{
			width: 780px;
			text-align: center;
			margin-left: 30px;
			margin-bottom: 10px;
			
		}
		#single_product{
			float: left;
			margin-left: 30px;
			padding: 10px;
		}
		.header{
			
		}
		a:active{
			background-color: aliceblue
			
		}
		#horizontal a{
			color: aliceblue;
			
			text-decoration: none;
		}
		#horizontal a:hover{
		
			color: white;
			font-weight: bold;
		}
		#left a{
			color: aliceblue;
			
			text-decoration: none;
		}
		#left a:hover{
			color: white;
			font-weight: bold;
		}
	</style>
</head>
<body style= 'background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%)';>
	<div class="wrapper">
		<div class="header">
			<div class="logo">
				<img src ="Img/129528251_3773265999390052_5804126381826182033_n.jpg" width="80" height="80">
			</div>
			<div class="form_search">
				<form action='search.php' method='post'>
					<input name='searchinput' type="text" placeholder="Search a Product" />
					<input name='submitsearch' type="submit" value="Search" />
				</form>
					<button class="login"> <a href="LoginForm.php">login </a></button>
			 &nbsp;&nbsp;
			<button class="register"> <a href="DangKyForm.php">register </a></button>
				
			</div>
			<div class="register_login">
			
		</div>

		</div>
		<div class="menu">
			<ul id="horizontal">
				<li> <a href="index.php"> Trang chủ </a> </li>
				<li> <a href="Admin/view_product.php">Quản lý sản phẩm </a></li>
				<li><a href="Admin/add_product.php"> Thêm sản phẩm </a> </li>
				<li><a href="Admin/view_category.php">Quản lý danh mục</a></li>
				<li><a href="Admin/add_category.php">Thêm danh mục</a></li>
				
			</ul>
		</div>
		<div class ="content">
			<div class ="left">
		   <?php 
            $connect = mysqli_connect('localhost','root','','mydatabase');
            if (!$connect){
           echo "ket noi that bai";
           }else {
           echo "";
           }
				$sql ="select * from category" ;
				$result = mysqli_query($connect,$sql);
				
				while($row_cats=mysqli_fetch_array($result)){
					$catID = $row_cats['CategoryID'];
					$catname = $row_cats['CategoryName'];
					echo "<li><a  href = ''>$catname</a></li>";
				}
		   ?>
			</div>
			<div class="right">
				<div id="sanpham">
<!--
					<div id='single_product'>
					<h3>Figure Sarutobi Hizuren</h3>
					<img src='Image/Detam.jpg' width='180' height='180' />
					<p><b> Price:9.000.000</b></p>
					<a href="">Details</a>
					<a href=""><button style='float: right'>Add to Cart</button>
					</a>
					</div>
-->
				
				</div>
 <div class="container">
 <div class="row">
				<?php 
    $connect = mysqli_connect('localhost','root','','mydatabase');
    if (!$connect){
   echo "ket noi that bai";
   }else {
   echo "";
   }
    if(isset($_GET['ProductID'])){
    $product_id=$_GET["ProductID"];
    $sql="SELECT * FROM product Where product.ProductID={$ProductID} ";
    $result= mysqli_query($connect,$sql);
    while ($row_pro=mysqli_fetch_array($result)) {    
     $ProductID = $row_pro['ProductID'];
            $ProductName = $row_pro['ProductName'];
            $ProductPrice = $row_pro['ProductPrice'];
            $CategoryID = $row_pro['CategoryID'];   
            $ProductImage = $row_pro['ProductImage'];
      echo "
            <div id='single_product'>
            <h3>$ProductName</h3>
            <img src='Images/$ProductImage' width='300' height='300' />
            <p><b> Price: $ProductPrice </b></p>          
            <button>Add to Cart</button>           
            </div>
            ";
    	}
    }
    	?>
        </div>
     </div>


				
			</div>
		</div>
		<div class="footer">
			<p> Địa chỉ : 300 Kim Mã </p>
			<a> Sđt : 0966002699 </a>
			<a> Giờ hoạt động từ 9h-22h</a>
		</div>
	</div>
	
	
</body>
</html>