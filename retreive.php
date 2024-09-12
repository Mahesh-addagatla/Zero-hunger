<?php
$host = "localhost";
$username = "ZeroHunger";
$password = "abc123";
$dbname = "zerohunger";

$con = mysqli_connect($host, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$searchInput = mysqli_real_escape_string($con, $_GET['search']);

// Check if the input is a valid email address
if (filter_var($searchInput, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT  name_, phone, email FROM signup WHERE email = '$searchInput'";
} else {
    $sql = "SELECT  name_, phone, email FROM signup WHERE name_ LIKE '%$searchInput%' OR email LIKE '%$searchInput%'";
}

$result = mysqli_query($con, $sql);
?>
<table id="userTable">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name_"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}

mysqli_close($con);
?>
