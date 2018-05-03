<!DOCTYPE HTML>
<?php
require_once 'process.php';

?>

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






</body>
</html>