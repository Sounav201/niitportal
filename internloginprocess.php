<?php
  session_start();
?>  
<?php 
include_once 'dbcon.php';

if(isset($_POST['submit']))
{

   $email = $_POST['email'];
   $password = $_POST['password'];
   //echo $email;
   $emailSearch = "select * from internreg where email='$email'";
   $query = mysqli_query($con, $emailSearch);
   $emailCount = mysqli_num_rows($query);

   if($emailCount)
   {
     $emailPass = mysqli_fetch_assoc($query);

     $dbPass =  $emailPass['password'];

     //$_SESSION['username'] = $emailPass['username'];
     
     $pass_decode = password_verify($password, $dbPass);

       if($pass_decode){

         ?>
                    <script>
                        alert("Logged in successfully!")
                        location.replace("Intern-Dashboard/template/index.html")
                        </script>
                <?php
               

       }
       else{
         ?>
                    <script>
                        alert("Password is incorrect!");
                        location.replace("login_page.html")
                        </script>
                <?php
       }


   }


  else{
     ?>
                    <script>
                        alert("Invalid Email!")
                        location.replace("login_page.html")
                        </script>
                <?php
   }

}

//$con->close();
?>
