<?php
 include("../config.php");
   session_start();
   

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
   $myusername= $_POST['username'];
   $mypassword= $_POST['password'];
   $connection = mysqli_connect("localhost", "root", "");

   $username = stripslashes($username);
   $password = stripslashes($password);
   $username = mysql_real_escape_string($username);
   $password = mysql_real_escape_string($password);

   $db = mysqli_select_db("samsat", $connection);
   $query= mysqli_query("SELECT * from tb_user WHERE password='$password' and username='$username'", $connection);
   $rows =mysqli_num_rows($query);

      if ($rows == 1) {
      $_SESSION['login_user']=$username; // Initializing Session
      header("location: welcome.php"); // Redirecting To Other Page
      } else {
      $error = "Username or Password is invalid";
      }
      mysqli_close($connection); // Closing Connection
      }
   
      
  
      
   //    $sql = "SELECT id FROM tb_user WHERE username = '$myusername' and passcode = '$mypassword'";
   //    $result = mysqli_query($sql,$conn);
   //    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //    $active = $row['active'];
      
   //    $count = mysqli_num_rows($result);
      
   //    // If result matched $myusername and $mypassword, table row must be 1 row
		
   //    if($count == 1) {
   //       session_register("myusername");
   //       $_SESSION['login_user'] = $myusername;
         
   //       header("location: welcome.php");
   //    }else {
   //       $error = "Your Login Name or Password is invalid";
   //    }
   // }
?>