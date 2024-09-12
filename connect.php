<?php
// Database connection parameters
$servername = "localhost";
$username = "ZeroHunger";
$password = "abc123";
$database = "zerohunger";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $foodItem = $_POST["foodItem"];
    $phoneNumber = $_POST["phoneNumber"];
    $quantity = $_POST["quantity"];
    $address = $_POST["address"];
    $deliveryTime = $_POST["deliveryTime"];
    $deliveryDate = $_POST["deliveryDate"];

    // SQL query to insert data into donatefood table
    $sql = "INSERT INTO donatefood (name_, food_item, phone_number, quantity, Address_, delivery_time, delivery_date) VALUES ('$name', '$foodItem', '$phoneNumber', $quantity, '$address', '$deliveryTime', '$deliveryDate')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
