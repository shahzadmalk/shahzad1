<?php
$host="localhost";
$name="root";
$password="";
$dbname="signup";

$conn=new mysqli($host,$name,$password,$dbname);

if(!$conn){
echo "Please make connection with database";


 $fname= $_POST['fname']; 
  $sname= $_POST['sname']; 
 $email= $_POST['email']; 
 $pswd= $_POST['pswd']; 
 $date= $_POST['date']; 
 $month= $_POST['month']; 
$year= $_POST['year']; 
$gender= $_POST['optradio'];


	 $dob = date("Y-m-d",strtotime($year."-".$month."-".$date));

	$query = "INSERT into signup (firstname,lastname,email,password,dob,gender) values ('$fname','$sname',  '$email', '$pswd' , '$dob', '$gender')";


	$sql = mysqli_query($conn, $query);

	if($sql){
		echo "Data Inserted Successfully";
	} 

	




?>
