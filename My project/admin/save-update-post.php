<?php
include "config.php";

if(empty($_FILES['new-image']['name'])){
    $file_name = $_POST['old-image'];

}else{
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    
    $file_size = $_FILES['new-image']['size'];
    
    $file_tmp = $_FILES['new-image']['tmp_name'];
    
    $file_type = $_FILES['new-image']['type'];
    
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions) === false)
    {
        $errors[]="this extension file is not allowed,please choose jpg,png";
    }
    if($file_size > 2097152){
        $errors[] = "file size must be 2 mb or lower.";
    }

    if($file_size > 2097152){
        $errors[] = "file size must be 2 mb or lower.";
    }

   
    if(empty($errors)=== true){
        move_uploaded_file($file_tmp,"upload/".$file_name);

    }else{
        print_r($errors);
        die();
    }
}

$sql = "update post set title ='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category= {$_POST["category"]}, post_img='{$file_name}' 
where post_id={$_POST["post_id"]};";

if($_POST['old_category'] != $_POST["category"] ){
    $sql .= "update category set post= post - 1 where category_id= {$_POST['old_category']};";
    $sql .= "update category set post= post + 1 where category_id= {$_POST["category"]};";
}


$result =mysqli_multi_query($conn,$sql);

if($result){
    header("location: post.php");
}





?>