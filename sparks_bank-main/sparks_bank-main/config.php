<?php 

$server="sql100.epizy.com";
$username="epiz_33104676";
$password="5O9Nq7NYcanir1";
$db="epiz_33104676_sparks_bank";

$conn=mysqli_connect($server,$username,$password,$db);

if($conn){
  //Connection successfully established
}

else
    die("connection to this database failed due to " .mysqli_connect_error()); //connection not establised
    echo "failed";
?>
