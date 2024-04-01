<?php
$host="localhost";
$name="root";
$password="";
$dbname="signup";

$conn=new mysqli($host,$name,$password,$dbname);

if(!$conn){
echo "Please make connection with database";
}


	$id = $_POST['id'];
	$sql = "DELETE FROM users WHERE id = '$id'";

	$query = mysqli_query($conn, $sql);
if($query){ 
echo "data deleted";

}


?>