<!DOCTYPE HTML>

<html>  
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 <style>
.error {color: #FF0000;}
</style>
</head>

<body>

<div class="container">
  <h2>Login Form</h2>
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label>UserName:</label> <span class="error">*</span>
      <input type="text" class="form-control" id="username" placeholder="Enter name" name="username" minlength="3"  maxlength="25" required>
	
    </div>
    <div class="form-group">
      <label for="email">Password:</label><span class="error">* </span>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
	  
    </div>
    
   
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
	
  </form>
</div>

<?php 


 

if(isset($_POST['submit'])){ 
  $username = $_POST['username']; 
  $password = md5($_POST['password']); 
  
  echo  $password;
  session_start();

$conn= mysqli_connect("127.0.0.1:3307","root","","mydb")or die(mysql_error());

$sql="select * from usertable where username='$username' AND password='$password'";

if ($result=mysqli_query($conn,$sql))
  {
   
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  echo 'Result set has %d rows.'.$rowcount ;
  if($rowcount==1){
      $_SESSION['username']=$username;
       $_SESSION['password']=$password;
      header('Location:process.php');
      
  }
  else
      echo'fail';
  // Free result set
  mysqli_free_result($result);
  }


}
?>






</body>
</html>