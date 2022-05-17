<?php
session_start();
$conn=new mysqli("localhost","root","","mydatabase");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $result=$conn->query("DELETE FROM `category` WHERE CategoryID='$id'");
    if($result){
        echo "<script>alert('Xoá thành công')</script>";
        header("location:view_category.php");
    }
    
}
?>