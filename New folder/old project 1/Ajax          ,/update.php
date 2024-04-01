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
  $last= $_POST['sname']; 
  $first= $_POST['fname']; 
  $email= $_POST['email']; 
  $date= $_POST['date'];
  $month= $_POST['month']; 
  $year= $_POST['year']; 
  $gender= $_POST['optradio'];

 $dob = date("Y-m-d",strtotime($year."-".$month."-".$date));


 $sql = "UPDATE users set firstname = '$first', lastname = '$last', email='$email', dob = '$dob', gender = '$gender' where id = '$id'";

 $query = mysqli_query($conn, $sql);
 if($query){

  echo 'Data Updated Successfully';
 }


  




?>
