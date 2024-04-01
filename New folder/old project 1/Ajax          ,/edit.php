<?php
$host="localhost";
$name="root";
$password="";
$dbname="first";

$conn=new mysqli($host,$name,$password,$dbname);

if(!$conn){
echo "Please make connection with database";
}

  $id= $_POST['id']; 

 if($id != Null){
 		 $edit = "SELECT * FROM users where id = '$id'";
 		 $query = mysqli_query($conn, $edit);

 		 if($query){
 		   	$row = mysqli_fetch_assoc($query);
 		   echo json_encode($row);

 		 }
 }




?>