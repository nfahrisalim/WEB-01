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

$registrationSuccess = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $in = $conn->prepare($sql);
    $in->bind_param("sss", $username, $password, $role);

    if ($in->execute() === TRUE) {
        $_SESSION['username'] = $username;
        $registrationSuccess = true; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $in->close();
}

$conn->close();
?>

<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>User Registration</title>
    <link href='style.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">
                        <h3>SICLUS 2024</h3>
                    </div>
                    <div class="steps-content">
                        <h3>Registration</h3>
                        <p>Register to access the system.</p>
                    </div>
                </div>
                <div class="right-side">
                    <form action="account.php" method="POST" id="Register-form">
                        <div class="main active">
                            <small><i class="fa fa-user"></i></small>
                            <div class="text">
                                <h2>User Registration</h2>
                                <p>Enter your details to create an account.</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input 
                                        type="text" 
                                        name="username" 
                                        required 
                                        id="user_name">
                                    <span>Username</span>
                                </div>
                                <div class="input-div">
                                    <input 
                                        type="text" 
                                        name="password" 
                                        required 
                                        id="password">
                                    <span>Password</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select 
                                        name="role" 
                                        required 
                                        class="select">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="submit" class="submit_button">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="successPopup">
        <div class="popup-content">
            <h2>Registration Successful!</h2>
            <p>Thank you for registering, <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
            <a href="login.php">Login Here</a>
        </div>
    </div>

    <script>
        <?php if ($registrationSuccess): ?>
            document.getElementById('successPopup').style.display = 'flex';
        <?php endif; ?>
    </script>
</body>
</html>
