<?php
  session_start();
?>  
<?php 
include 'dbcon.php';

if(isset($_POST['submit']))
{

   $email = $_POST['email'];
   $password = $_POST['password'];
   //echo $email;
   $emailSearch1 = "select * from registration where email='$email'";
   $query1 = mysqli_query($con, $emailSearch1);
   $emailCount1 = mysqli_num_rows($query1);
   $emailSearch2 = "select * from internreg where email='$email'";
   $query2 = mysqli_query($con, $emailSearch2);
   $emailCount2 = mysqli_num_rows($query2);

   if($emailCount1)
   {
     $emailPass = mysqli_fetch_assoc($query1);

     $dbPass =  $emailPass['password'];

     //$_SESSION['username'] = $emailPass['username'];
     
     $pass_decode = password_verify($password, $dbPass);

       if($pass_decode){

         ?>
                    <script>
                        alert("Logged in successfully!")
                        location.replace("index.html")
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
  else if($emailCount2)
   {    

    $emailPass = mysqli_fetch_assoc($query2);

    $dbPass =  $emailPass['password'];

    $_SESSION['username'] = $emailPass['username'];
    
    $pass_decode = password_verify($password, $dbPass);

      if($pass_decode){

        ?>
                   <script>
                       alert("Logged in successfully!")
                       location.replace("index.html")
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
