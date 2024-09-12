






<?php 

session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $db_username = "ZeroHunger";
    $db_password = "abc123";
    $dbname = "zerohunger";

    $con = mysqli_connect($host, $db_username, $db_password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT email,phone, pass FROM signup WHERE email = '$username'";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameter to the statement
    mysqli_stmt_bind_param($stmt,  $username);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $username, $hashed_password);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Verify password
    if ($username && password_verify($password, $hashed_password)) {
        // Password is correct, start a session
        $_SESSION["username"] = $username;
        header("Location: index.php"); // Redirect to a welcome page or dashboard
        exit();
    } else {
        echo "Invalid username or password";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
