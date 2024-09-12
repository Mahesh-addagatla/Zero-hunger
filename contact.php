<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];		    // getting and storing inputs in variables
    $email = $_POST['email'];
    $subject=$_POST['subject'];
    $message = $_POST['message'];
    //database details. You have created these details in the third step. Use your own.
    $host = "localhost";
    $username = "ZeroHunger";
    $password = "abc123";
    $dbname = "zerohunger";
    //create connection
    $con = mysqli_connect($host, $username, $password, $dbname);
    //check connection if it is working or not
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    //This below line is a code to Send form entries to database
    $sql = "INSERT INTO contact ( name_, email,subject_, message_) VALUES ( '$name', '$email', '$subject','$message')";
    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        header("Location : index.html");
    }
    else{
        echo "Error, Message didn't send! Something's Wrong."; 
    }
    //connection closed.
    mysqli_close($con);
}
?>
