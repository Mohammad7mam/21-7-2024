<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];

    $sql = "UPDATE Employees SET Name='$name', Address='$address', Salary='$salary' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo '<br><a href="index.php"><button>Back to Employee List</button></a>';
            } else {
                echo "Error updating record: " . $conn->error;
                echo '<br><a href="index.php"><button>Back to Employee List</button></a>';
                    }

    $conn->close();
    exit;
} else {
    $sql = "SELECT * FROM Employees WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Employee</h1>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>">
            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary" value="<?php echo $row['Salary']; ?>">
            <input type="submit" value="Update">
        </form>
        <a href="index.php"><button>Back to Employee List</button></a>
    </div>
</body>
</html>

