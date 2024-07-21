<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];

    $sql = "INSERT INTO Employees (Name, Address, Salary) VALUES ('$name', '$address', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New Employee</h1>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary">
            <input type="submit" value="Submit">
        </form>
        <a href="index.php"><button>Back to Employee List</button></a>
    </div>
</body>
</html>
