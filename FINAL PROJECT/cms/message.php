<?php


$conn = mysqli_connect("localhost", "root", "", "cms");
if(isset($_POST['submit']))
         
// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
 
// Taking all 5 values from the form data(input)
$Name =  $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$Message = $_POST['Message'];


 
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO user_complain(Name,Email,Phone,Address,Message) VALUES ('$Name',
    '$Email','$Phone','$Address','$Message')";
 
if(mysqli_query($conn, $sql)){
    echo "successfully submitted your form";

    
} else{
    echo "ERROR: Hush! Sorry $sql. ";
     
}
 
// Close connection
mysqli_close($conn);
?>