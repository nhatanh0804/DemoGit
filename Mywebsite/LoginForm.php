<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
			<form method="post">
	<table>
	<tr>
	<td><label>Username</label></td>
	<td><input type="text"  name="username"></td>	
	 </tr>
	<tr>
	<td><label>Mật khẩu</label></td>
	<td><input type="password"  name="password"></td>
	
	<tr>
		<td><input type="submit" value="submit" name="login"></td>
		
	</tr>
		<tr>
		
			<td><a href="DangKyForm.html">Create an account</a></td>
			
		
		</tr>
	<tr><td><a href="Quenmk.html">Forgot Password</a></tr>
	</table>
	</form>
	<?php 

	
    $connect = mysqli_connect('localhost','root','','mydatabase');
    if (!$connect){
        echo "ket noi that bai";
    }else {
        echo "ket noi thanh cong";
    }
	if (isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql="select * from users where UserName='$username' AND Password='$password'";
		$result = mysqli_query($connect,$sql);
		$checklogin = mysqli_num_rows($result);
		$row_login = mysqli_query($result);
		if($checklogin == 0 ){
			echo "<script>alert('Password or username is incorrect, please try again')</script>";
			exit();
		}
	if($checklogin > 0 ){
		$_SESSION['UserID'] = $rowlogin['UserID'];
		$_SESSION[$username] = $username;
		echo "<script>alert('You have logged in successfully')</script>";
		echo"<script>window.open('index.php','_self')</script>";
	}
	}
?>
</form>


				
			</div>
		</div>
		<div class="footer">
			<p> Đây là footer </p>
		</div>
	</div>
	
	
</body>
</html>
