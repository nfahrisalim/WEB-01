<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siclus2024";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; 
        header("Location: home.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css"> 
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <h3 class="left-heading">Welcome</h3>
                    <div class="steps-content">
                        <p>Login untuk lanjut</p>
                    </div>
                </div>
                <div class="right-side">
                    <div class="main active">
                        <form action="login.php" method="POST">
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="username" required placeholder=" ">
                                    <span>Username</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="password" name="password" required placeholder=" ">
                                    <span>Password</span>
                                </div>
                            </div>
                            <div class="button_space">
                                <div class="buttons"> 
                                    <button type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
