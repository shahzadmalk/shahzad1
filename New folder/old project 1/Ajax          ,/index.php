<?php
$host="localhost";
$name="root";
$password="";
$dbname="signup";

$conn=new mysqli($host,$name,$password,$dbname);

if(!$conn){
 "Please make connection with database";
}

 $sql = "SELECT * from signup";
 $query = mysqli_query($conn, $sql);

 $users = [];

 

 while($rows = mysqli_fetch_assoc($query)){

  $users[] = $rows;

 } 

 




?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Sign Up</h2>
  <h6>It's quick and easy.</h6>
  <form id="signupform">
    <div class="mb-3 mt-3">
        <div class="row">
      <div class="col">

<input type="hidden" class="form-control id"  name="id">


        <input type="text" class="form-control fname" placeholder="First Name" name="fname">
      </div>
      <div class="col">
        <input type="text" class="form-control sname" placeholder="Surname" name="sname">
      </div>
    </div>
    <br>
      
      <input type="email" class="form-control email" id="email" placeholder="Mobile Number or Email address" name="email">
    </div>
    <div class="mb-3">
      
      <input type="password" class="form-control" id="pwd" placeholder="New Password" name="pswd">
    </div>
    <h6>Date of Birth</h6>
   <div class="row">
    <div class="col-3">
        <select class="form-select form-select-sm day" name="date">
     <option>01</option>
     <option>02</option>
     <option>03</option>
     <option>04</option>
     <option>05</option>
     <option>06</option>
     <option>07</option>
     <option>08</option>
     <option>09</option>
     <option>10</option>
     <option>11</option>
     <option>12</option>
     <option>13</option>
     <option>14</option><option>15</option>
     <option>16</option>
     <option>17</option>
     <option>18</option>
     <option>19</option>
     <option>20</option>
     <option>22</option>
     <option>23</option>
     <option>24</option>
     <option>25</option>
     <option>26</option>
     <option>27</option>
     <option>28</option>
     <option>29</option>
     <option>30</option>
     <option>31</option>
    
   </select>
      
    </div>
    <div class="col-3">
        <select class="form-select form-select-sm month" name="month">
     <option>January</option>
     <option>February</option>
     <option>March</option>
     <option>April</option>
     <option>May</option>
     <option>June</option>
     <option>July</option>
     <option>August</option>
     <option>September</option>
     <option>October</option>
     <option>November</option>
     <option>December</option>
   </select>
      
    </div>
    <div class="col-3">
        <select class="form-select form-select-sm year" name="year">
     <option>1990</option>
     <option>2000</option>
     <option>2001</option>
     <option>2002</option>
     <option>2003</option>
     <option>2004</option>
     <option>2005</option>
   </select>
      
    </div>
     
   </div>
   <br>
   <div class="row">
    <div class="col-3">
      <input type="radio" class="form-check-input male" id="male" name="optradio" value="Male" checked>
      <label class="form-check-label" for="radio1">Male</label>
      
    </div>
    <div class="col-3">
      <input type="radio" class="form-check-input female" id="female" name="optradio1" value="Female" checked>
      <label class="form-check-label" for="radio1">Female</label>
      
    </div>
  
<br>
<p>People who use our service may have uploaded your contact information to <br> Facebook. Learn more.

By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy.<br> You may receive SMS notifications from us and can opt out at any time.</p>
     
   </div>
   <br>
     <div class="text-center">
       <button type="button" class="btn btn-success submitbtn">Sign Up</button>

       <button type="button" class="btn btn-warning updatebtn d-none">Update</button>
     </div>

    
  </form>
  <div class="text-danger appenderror">
    
  </div>


  <div>

    <table>
      <thead>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
         
          <th>DOB</th>
          <th>Gender</th>
          <th>Action</th>
      </thead>



      <tbody>

        <?php 

          if(count($users) > 0){
          foreach($signup as $signup){
       ?>
        <tr>

          <td> <?php echo $user['firstname']; ?></td>
          <td> <?php echo $user['lastname']; ?></td>
          <td> <?php echo $user['email']; ?></td>
          <td> <?php echo $user['dob']; ?></td>
          <td> <?php echo $user['gender']; ?></td>

          <td> <button type="button" class="edit" id="<?php echo $user['id']; ?>">Edit</button> <button type="button" class="delete" id="<?php echo $user['id']; ?>">Delete</button> </td>
          
          
        </tr>

        <?php }}  ?>
        
      </tbody>
    </table>
    
  </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script >
   $(document).ready(function(){

  $('.submitbtn').click(function(){

    var myform=document.getElementById('signupform');
    var data = new FormData(myform);
    
    $.ajax({
     url:'signup.php',
     data:data,
     type:'post',
     cache:false,
     processData:false,
     contentType:false,
    }).done(function(response){
       $('.appenderror').append('');
      $('.appenderror').append(response);
    })
  });


  $(document).on('click','.edit',function(){

    
     // firstname = $(this).closest('tr').children();
     // firstname = firstname;
     // console.log(firstname);


    var myform=document.getElementById('signupform');
    var data = new FormData(myform);

    var id = $(this).attr('id');
    // data.append('id',id);

     $.ajax({
     url:'edit.php',
     type:'post',
     data:{
      id:id,
     },
    }).done(function(response){
       $('.appenderror').append('');
      $('.appenderror').append(response);

       response =  JSON.parse(response); 

       $('.id').val(response.id);
       $('.fname').val(response.firstname);
       $('.sname').val(response.lastname);
       $('.email').val(response.email);

       // $('.day').val(response.firstname);
       // $('.fname').val(response.firstname);
       // $('.fname').val(response.firstname);

       if(response.gender == 'Female'){
        $('.female').prop('checked', true);
       }
       else{
        $('.male').prop('checked', true);
       }
       
      // let text = response.dob;
      //  text = text.toString();

      //  const myArray = text.split("-");
       
    
    
var originalDate = response.dob;
var parts = originalDate.split('-');
var year = parseInt(parts[0]);
var month = parseInt(parts[1]) - 1; // Month is zero-based in JavaScript
var day = parseInt(parts[2]);

var dateObject = new Date(year, month, day);



var options = { year: 'numeric', month: 'long', day: 'numeric' };
var formattedDate = dateObject.toLocaleDateString('en-US', options);

   
 formattedDate = formattedDate.replace(",", "")
     const myArray = formattedDate.split(" ");
    console.log(myArray[0]);

       $('.year').val(myArray[2]).trigger('change');
       $(".day").val(myArray[1]).trigger('change');
       $(".month").val(myArray[0]).trigger('change');

        $(".submitbtn").addClass('d-none');
        $(".updatebtn").removeClass('d-none');

      
      
    })

  });


  $(".updatebtn").click(function(){

    var myform=document.getElementById('signupform');
    var data = new FormData(myform);


    $.ajax({
     url:'update.php',
     data:data,
     type:'post',
     cache:false,
     processData:false,
     contentType:false,
    }).done(function(response){
       $('.appenderror').append('');
      $('.appenderror').append(response);
    })
  });




$(document).on('click', '.delete', function(){

  id = this.id;


  $.ajax({
     url:'delete.php',
     type:'post',
     data:{
      id:id,
     },
    }).done(function(response){

        console.log(response);
    });



});




  })
</script>
</body>
</html>
 