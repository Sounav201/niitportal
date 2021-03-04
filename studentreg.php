<?php 
session_start();
?>
<?php  
include 'dbcon.php';

    if(isset($_POST['submit'])){
        //For Students
        $Fname = mysqli_real_escape_string($con,$_POST['firstname']);
        $Lname =mysqli_real_escape_string($con, $_POST['lastname']);
        $Password =mysqli_real_escape_string($con, $_POST['password']);
        $Cpassword =mysqli_real_escape_string($con, $_POST['cpassword']);
        $Gender =mysqli_real_escape_string($con, $_POST['gender']);
        $Email =mysqli_real_escape_string($con, $_POST['email']);
        $Phone =mysqli_real_escape_string($con, $_POST['txtEmpPhone']);
        $SecurityQues =mysqli_real_escape_string($con, $_POST['securityquestion']);

        //For Interns
        



        $pass = password_hash($Password, PASSWORD_BCRYPT);
        $cpass = password_hash($Cpassword, PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email= '$Email' ";
        $query = mysqli_query($con,$emailquery);

        $emailCount = mysqli_num_rows($query);
      

        if($emailCount>0)
        { ?>

        <script>
        alert("Email already exists!");
        location.replace('register.html')
        </script>
       <?php     
        }
        else{
            if($Password === $Cpassword)
            {
                $insertquery = "insert into registration (firstname, lastname, password, cpassword, email, phone, question, gender)
                 values ('$Fname','$Lname','$pass','$cpass','$Email','$Phone','$SecurityQues','$Gender')";

                 $iquery = mysqli_query($con, $insertquery);
                 if($iquery)
                 { ?>
                     <script>
                         alert("User registered successfully!")
                         location.replace('login_page.html')
                         </script>
                 <?php
                 }
                 
                 else{ 
                     ?>
                     <script>
                         alert("User could not be registered!")
                         location.replace('register.html')
                         </script>
                 
                     <?php
                 }
                 

                 
            }
            else{  
             ?>
                    <script>
                     alert("Passwords do not match!");
                     location.replace('register.html')
                    </script>
                <?php 
                 
            }

        }
        

    }

 $con->close();
?>
