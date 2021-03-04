<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "signup";

$con = mysqli_connect($server, $user, $pass , $db);

if($con)
{ 
    
    ?>
    <!-- <script>
        alert("Database connected!")
        </script> -->
<?php
}

else{ ?>
    <script>
        alert("Database Connection Error! Kindly Contact Admin.")
        </script>

    <?php
}


?>