<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role']; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siclus2024";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM participants";
$result = $conn->query($sql);

if ($role == 'admin') {
    $sqlUsers = "SELECT * FROM users";
    $resultUsers = $conn->query($sqlUsers);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICLUS 2024</title>
    <link rel="stylesheet" href="home.css"> 
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <h2>SICLUS</h2>
            <ul>
                <li><a href="#" id="showDataForm">Participant</a></li>
                <?php if ($role == 'admin'): ?>
                    <li><a href="#" id="showUsers">Users</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <div class="content">
            <h3>Welcome, <?= $_SESSION['username']; ?> (<?= $role; ?>)</h3>

            <div class="data-section" id="dataFormSection">
                <h4>Participant</h4>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Student ID</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Faculty</th>
                            <th>Batch</th>
                            <th>Institution</th>
                            <?php if ($role == 'admin'): ?>
                                <th>Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row['personal_name'] . "</td>";
                                echo "<td>" . $row['major'] . "</td>";
                                echo "<td>" . $row['nim'] . "</td>";
                                echo "<td>" . $row['phone_number'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['faculty'] . "</td>";
                                echo "<td>" . $row['batch'] . "</td>";
                                echo "<td>" . $row['institution'] . "</td>";
                                if ($role == 'admin') {
                                    echo "<td class='actions'>";
                                    echo "<button class='edit-btn' onclick='editData(" . $row['id'] . ")'>Edit</button>";
                                    echo "<button class='delete-btn' onclick='deleteData(" . $row['id'] . ")'>Delete</button>";
                                    echo "</td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php if ($role == 'admin'): ?>
                <div class="data-section" id="userSection" style="display:none;">
                    <h4>Users</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultUsers->num_rows > 0) {
                                $no = 1;
                                while ($row = $resultUsers->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['role'] . "</td>";
                                    echo "<td class='actions'>";
                                    echo "<button class='edit-btn' onclick='editUser(" . $row['id'] . ")'>Edit</button>";
                                    echo "<button class='delete-btn' onclick='deleteUser(" . $row['id'] . ")'>Delete</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No user records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Toggle views between Data Form and Users section
        document.getElementById("showUsers").addEventListener("click", function() {
            document.getElementById("dataFormSection").style.display = "none";
            document.getElementById("userSection").style.display = "block";
        });

        document.getElementById("showDataForm").addEventListener("click", function() {
            document.getElementById("userSection").style.display = "none";
            document.getElementById("dataFormSection").style.display = "block";
        });

        function toggleView() {
            document.getElementById("userSection").style.display = "none";
            document.getElementById("dataFormSection").style.display = "block";
        }

        function editData(id) {
            window.location.href = `edit_data.php?id=${id}`;
        }

        function deleteData(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = `delete_data.php?id=${id}`;
            }
        }

        function editUser(id) {
            window.location.href = `edit_user.php?id=${id}`;
        }

        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = `delete_user.php?id=${id}`;
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>