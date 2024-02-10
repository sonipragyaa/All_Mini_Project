<?php
include "header.php"; 

if($_SESSION["user_role"]==0){

header("Location:post.php");
}

include "config.php";
$userid = $_GET['id'];
$sql = "delete from user where user_id={$userid}";
if(mysqli_query($conn,$sql)){

    header("Location: users.php");
}else{
    echo " style = 'color:red;margin:10px 0;'<p>cannot delete user record</p>";

}
mysqli_close($conn);

?>