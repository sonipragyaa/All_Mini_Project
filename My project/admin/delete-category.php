<?php
include "header.php"; 

if($_SESSION["user_role"]==0){

header("Location:post.php");
}

include "config.php";
$category_id = $_GET['id'];
$sql = "delete from category where category_id={$category_id}";
if(mysqli_query($conn,$sql)){

    header("Location: category.php");
}else{
    echo " style = 'color:red;margin:10px 0;'<p>cannot delete user record</p>";

}
mysqli_close($conn);

?>