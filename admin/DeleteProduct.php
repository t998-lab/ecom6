<?php
include("includes/connection.php");
$id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM products WHERE pro_id={$id}");
if($query)
{
    header("location:productManage.php");
}
?>