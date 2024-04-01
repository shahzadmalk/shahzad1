<?php
$id = $_POST['id'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];


$conn = new mysqli('localhost','root','','tst');

if ($conn->connect_error) {
	die( 'connection_failed : '.$conn->connect_error);
}else{

	 $query="Insert into tst(fname,sname,email,pswd,gender,dob)  values('$fname','$sname','$email','$pswd','$gender','$dob')";
	mysqli_query($conn,$query);
	$conn->close();

	echo "Data Save Successfully";

}






 ?>
 