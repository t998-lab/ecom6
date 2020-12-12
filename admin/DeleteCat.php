<?php
include("includes/connection.php");
$id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM category WHERE cat_id={$id}");
if($query)
{
    header("location:categoryManage.php");
}
?>