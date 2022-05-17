<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		#horizontal li{
    display: inline;
    list-style: none;
    padding: 10px;	
    list-style-type: none;
    text-align: center;
			text-decoration: none;}
		.wrapper{
			width: 1000px;
			height: auto;
			margin: auto;
		}
		.header{
			height: 55px;
			margin: auto;
			border: 1px solid black;
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
			background: gray;
			height: 1000px;
			float: left;
		}
		.right{
			width: 80%;
			
			height: 300px;
			float:right;
		}
		.footer{
			width: 100%;
			height: 100px;
			background: red;
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
		
	</style>
</head>
<body>
	<form method="post">
		<table>
			<div class="wrapper">
		<div class="header">
			<div class="logo">
				<img src >
			</div>
			<div class="form_search">
				<form>
					<input type="text" placeholder="Search a Product" />
					<input type="submit" value="Search" />
					<button class="login"> <a href="LoginForm.php">login </a></button>
			 &nbsp;&nbsp;
			<button class="register"> <a href="DangKyForm.php">register </a></button>
				</form>
			</div>
			<div class="register_login">
			
		</div>

		</div>
		<div class="menu">
			<ul id="horizontal">
				<li> <a href="../Baidemo/index.html"> Trang chủ </a> </li>
				<li> <a href="../Baidemo/Admin/view_product.html">Quản lý sản phẩm </a></li>
				<li><a href="../Baidemo/Admin/add_product.html"> Thêm sản phẩm </a> </li>
				<li><a href="../Baidemo/about.html"> Giới thiệu </a></li>
			</ul>
		</div>
		<div class ="content">
			<div class ="left">
				<p> Đây là phần bên trái</p>
			</div>
			<div class="right">
			<tr>
				<td>UserID: </td>
				<td><input type="text" required placeholder="Enter your email" name="UserID"</td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><input type="text" required placeholder="Enter your username" name="Username"></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" required placeholder="Enter your pass" name="Password"></td>
			</tr>
			<tr>
				<td>Fullname: </td>
				<td><input type="text" required placeholder="Your fullname" name="Fullname"</td>
			</tr>
			<tr>
		        <td><input type="submit" value="submit" name="register"></td>
	        </tr>
			<div class="footer">
			<p> Đây là footer </p>
		</div>
		</table>
		<?php 
    $connect = mysqli_connect('localhost','root','','mydatabase');
	mysqli_set_charset($connect,"utf8");
		
    if (!$connect){
        echo "ket noi that bai";
    }else {
        echo "ket noi thanh cong";
    }
		if (isset($_POST['register'])){
			$UserID= $_POST['UserID'];
			$UserName= $_POST['Username'];
			$Password= $_POST['Password'];
			$Fullname= $_POST['Fullname'];
			$sql="insert into users values('$UserID','$UserName','$Password','$Fullname')";
			$result = mysqli_query($connect,$sql);
			if ($result){
				echo "<script>alert('Tạo tài khoản thành công')</script>";
		       echo"<script>window.open('LoginForm.php','_self')</script>";
			}
			else{
				echo"<script>alert('Lỗi')</script>";
			}
			}
		
?>
			
</form>
	
	
</body>
</html>