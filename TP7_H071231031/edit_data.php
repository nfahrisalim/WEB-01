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
    $sql = "SELECT * FROM participants WHERE id = $id";
    $result = $conn->query($sql);
    $participant = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $major = $_POST['major'];
    $nim = $_POST['nim'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $faculty = $_POST['faculty'];
    $batch = $_POST['batch'];
    $institution = $_POST['institution'];

    $sqlUpdate = "UPDATE participants SET personal_name='$name', major='$major', nim='$nim', phone_number='$phone', email='$email', faculty='$faculty', batch='$batch', institution='$institution' WHERE id = $id";
    
    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: home.php");
        exit(); // Menghentikan eksekusi lebih lanjut setelah redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Participant</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
        <h2>Edit Participant</h2>
        <form method="POST">
            <input type="text" name="name" value="<?= $participant['personal_name']; ?>" required placeholder="Name">
            <input type="text" name="major" value="<?= $participant['major']; ?>" required placeholder="Major">
            <input type="text" name="nim" value="<?= $participant['nim']; ?>" required placeholder="Student ID">
            <input type="text" name="phone" value="<?= $participant['phone_number']; ?>" required placeholder="Phone Number">
            <input type="email" name="email" value="<?= $participant['email']; ?>" required placeholder="Email">
            <input type="text" name="faculty" value="<?= $participant['faculty']; ?>" required placeholder="Faculty">
            <input type="text" name="batch" value="<?= $participant['batch']; ?>" required placeholder="Batch">
            <input type="text" name="institution" value="<?= $participant['institution']; ?>" required placeholder="Institution">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
