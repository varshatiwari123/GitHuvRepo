<?php
// Initialize the session
//require_once 'config.php';
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    
    
     
    
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h1>
         
    </div>
    
    
    
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="photo" required>
   <input type="submit" name="submit_image" value="Upload" onclick="return mess()">
   
   <script type="text/javascript">
     function mess(){
         alert(" image is sucessfully loaded");
         return true;
     }  
       
   </script>
    </form>
    
    <?php
 //require_once 'config.php';
  //    $msg = "";
    
    
 if (isset($_POST['submit_image'])) {

     $image = $_FILES['photo']['name'];
   // $image_text = mysqli_real_escape_string($link, $_POST['image_text']);
       $link= mysqli_connect("127.0.0.1:3307","root","","mygallary")or die(mysql_error());
       
     $username=$_SESSION['username'];
     
    $target = "images/".basename($image);
    $sql = "INSERT INTO gallery (name,image) VALUES ('$username','$image')";
    mysqli_query($link, $sql);
  
    if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)) 
{ 
    //$msg = "Image uploaded successfully";
        header("Location:welcome.php");
        exit();
}
 else {
    $msg = "Failed to upload image";
}
 }
  
 
?>
    
    <?php
     if(!$_SESSION['username']==NULL)
     {
       $link= mysqli_connect("127.0.0.1:3307","root","","mygallary")or die(mysql_error());
              
     $username=$_SESSION['username'];
     $result = mysqli_query($link, "SELECT * FROM gallery  where name='$username'");
    
    while ($row = mysqli_fetch_array($result)) {
     
       echo "<img class='px-2 mt-2' height='150' width='150' src='images/".$row['image']."' >";
         // echo "<p>".$row['username']."</p>";
        
     
    }
    $result = mysqli_query($link, "SELECT * FROM gallery  where name='$username'");
    
     }
    
  ?>

    

</body>

</html>