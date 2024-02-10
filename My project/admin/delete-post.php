<?php
include "config.php";
$post_id = $_GET['id'];
$cat_id = $_GET['catid'];

//delete image from folder

$sql1 = "select * from post where post_id = {$post_id}";
$result = mysqli_query($conn, $sql1) or die("query failed:select");

$row = mysqli_fetch_Assoc($result);
unlink("upload/".$row['post_img']);//for deleting the folder

$sql = "delete from post where post_id = {$post_id};";

$sql .= "update category set post= post - 1 where category_id= {$cat_id}";

if(mysqli_multi_query($conn,$sql)){
    
    header("location: post.php");
}else{
    echo "query failed";
}

?>