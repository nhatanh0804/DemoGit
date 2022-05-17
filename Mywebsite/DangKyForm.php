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
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Image</label></td>
				
			</tr>
			<tr>
				<td><input type="file" name="Image"></td>
			</tr>
			<tr>
				<td>UserID: </td>
				<td><input type="text" name="UserID"></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><input type="text"  name="Username"></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password"  name="Password"></td>
			</tr>
			<tr>
				<td>Fullname: </td>
				<td><input type="text"  name="Fullname"</td>
			</tr>
			<tr>
		        <td><input type="submit" value="submit" name="register"></td>
	        </tr>
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
			$file= $_FILES['Image']['name'];
			$file_tmp = $_FILES['Image']['tmp_name'];
			$path= "Avatar/";
			move_uploaded_file($file_tmp,$path.$file);
			$UserID= $_POST['UserID'];
			$UserName= $_POST['Username'];
			$Password= $_POST['Password'];
			$Fullname= $_POST['Fullname'];
			$sql="insert into users values('$UserID','$UserName','$Password','$Fullname','$file')";
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
