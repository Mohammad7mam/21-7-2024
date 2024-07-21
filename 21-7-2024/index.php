<?php
include 'config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch employees
$sql = "SELECT * FROM Employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Employee Management</h1>
        <a href="create.php"><button>Add New Employee</button></a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Address']}</td>
                            <td>{$row['Salary']}</td>
                            <td>
                                <a href='read.php?id={$row['id']}'><button>View</button></a>
                                <a href='update.php?id={$row['id']}'><button>Update</button></a>
                                <a href='delete.php?id={$row['id']}'><button>Delete</button></a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No employees found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
