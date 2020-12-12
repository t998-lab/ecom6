<?php
include("includes/connection.php");
$id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM admin WHERE admin_id={$id}");
if($query)
{
    header("location:adminManage.php");
}
?>