<?php
include "config.php";

if(empty($_FILES['logo']['name'])){
    $file_name=$_POST['old_logo'];
}else{
    $errors = array();

    $errors = array();

    $file_name = $_FILES['logo']['name'];
    
    $file_size = $_FILES['logo']['size'];
    
    $file_tmp = $_FILES['logo']['tmp_name'];
    
    $file_type = $_FILES['logo']['type'];
    
    $exp = explode('.',$file_name);
    $file_ext = end($exp);

    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions) === false)
    {
        $errors[]="this extension file is not allowed,please choose jpg,png";
    }
    if($file_size > 2097152){
        $errors[] = "file size must be 2 mb or lower.";
    }
    if(empty($errors)=== true){
        move_uploaded_file($file_tmp,"images/".$file_name);

    }else{
        print_r($errors);
        die();
    }

}

$sql = "update settings set websitename ='{$_POST['website_name']}',logo='{$file_name}',description='{$_POST['webdesc']}'";
 $result= mysqli_query($conn,$sql);
if($result){

    header("Location: setting.php");
}else{
    echo "query failed";
}
?>