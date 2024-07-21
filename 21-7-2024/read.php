<?php
include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM Employees WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employee</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Employee Details</h1>
        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Name:</strong> <?php echo $row['Name']; ?></p>
        <p><strong>Address:</strong> <?php echo $row['Address']; ?></p>
        <p><strong>Salary:</strong> <?php echo $row['Salary']; ?></p>
        <a href="index.php"><button>Back to Employee List</button></a>
    </div>
</body>
</html>
