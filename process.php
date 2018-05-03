
<?php 

if(isset($_POST['submit'])){ 
  $username = $_POST['username']; 
  $password = md5($_POST['password']); 
  
  session_start();

$link= mysqli_connect("127.0.0.1:3307","root","","mydb")or die(mysql_error());

//$sql="select * from usertable where username='$username' AND password='$password'";
 $sql = "SELECT username,password  FROM usertable WHERE username = ? AND password = ?";

if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_password);
          
            // Set parameters
            $param_username = $username;
             $param_password= $password;
      
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                  
                // Store result
                mysqli_stmt_store_result($stmt);
              
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){  
                   
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: welcome.php");
//                    
                } else{
                    // Display an error message if username doesn't exist
                    echo " The username and password is invalid .";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($link);

}

?>


 

