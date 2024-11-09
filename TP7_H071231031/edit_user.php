<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siclus2024";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $sqlUpdate = "UPDATE users SET username='$username', role='$role' WHERE id = $id";
    
    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: home.php");
        exit(); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST">
            <input type="text" name="username" value="<?= $user['username']; ?>" required placeholder="Username">
            <select name="role" required>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
