<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];	
    $phone =$_POST['phone'];	  
    $email = $_POST['email'];
    $password_=$_POST['password'];
    $role =  $_POST['job'];
    
    $host = "localhost";
    $username = "ZeroHunger";
    $password = "abc123";
    $dbname = "zerohunger";
    
    $con = mysqli_connect($host, $username, $password, $dbname);
    
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
   
    $sql = "INSERT INTO signup (role_,name_, phone, email,pass) VALUES ('$role', '$name','$phone', '$email', '$password_')";
    
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        header("Location:index.html");
    }
    else{    
        echo "Error, Message didn't send! Something's Wrong."; 
    }

    mysqli_close($con);
}
?>
