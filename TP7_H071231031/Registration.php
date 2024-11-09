<?php
include 'conn.php';
session_start(); // Pastikan session dimulai

$registrationSuccess = false; // Inisialisasi variabel di luar if

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personal_name = $_POST['PersonalName'];
    $major = $_POST['Major'];
    $nim = $_POST['Nim'];
    $gender = $_POST['Gender'];
    $phone_number = $_POST['ParticipantPhoneNumber'];
    $email = $_POST['teamLeaderEmail'];
    $faculty = $_POST['Faculty'];
    $batch = $_POST['Batch'];
    $institution = $_POST['institution'];

    $stmt = $conn->prepare("INSERT INTO participants (personal_name, major, nim, gender, phone_number, email, faculty, batch, institution) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssssssss", $personal_name, $major, $nim, $gender, $phone_number, $email, $faculty, $batch, $institution);

        if ($stmt->execute()) {
            $_SESSION['username'] = $personal_name;
            $registrationSuccess = true;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Registrasi</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="./app.js" defer></script>
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
                        <h3>Step <span class="step-number">1</span></h3>
                        <p class="step-number-content active">Enter your information to participate in SICLUS 2024.</p>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">Your Information</li>
                        <li>Contact</li>
                        <li>Faculty & Batch</li>
                    </ul>
                </div>
                <div class="right-side">
                    <form id="Register-form" method="POST" enctype="multipart/form-data">
                        <div class="main active">
                            <small><i class="fa fa-envira"></i></small>
                            <div class="text">
                                <h2>Your Information</h2>
                                <p>Enter your information to participate in SICLUS 2024.</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input 
                                        type="text"
                                        name="PersonalName"
                                        required
                                        id="user_name">
                                    <span>Full Name</span>
                                </div>
                                <div class="input-div"> 
                                    <input type="text" name="Major" required>
                                    <span>Major</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="Nim" required>
                                    <span>Student ID</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select 
                                        name="Gender"
                                        id="theme"
                                        required
                                        class="select">
                                        <option value="">Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Rather Not to say</option>
                                    </select>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>
                        
                        <div class="main">
                            <small><i class="fa fa-envira"></i></small>
                            <div class="text">
                                <h2>Contact</h2>
                                <p>Inform us about your contact.</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input 
                                        type="tel" 
                                        name="ParticipantPhoneNumber"
                                        required 
                                        pattern="\+?[0-9]{10,15}" 
                                        title="Phone number must be between 10 to 15 digits and can start with +">
                                    <span>Phone number</span>
                                </div>
                                <div class="input-div">
                                    <input 
                                        type="email"
                                        name="teamLeaderEmail" 
                                        required 
                                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" 
                                        title="Please enter a valid email address">
                                    <span>E-mail Address</span>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="button" class="next_button">Next Step</button>
                            </div>
                        </div>

                        <div class="main">
                            <small><i class="fa fa-envira"></i></small>
                            <div class="text">
                                <h2>Faculty & Batch</h2>
                                <p>Give us information about your study</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="Faculty" required>
                                    <span>Faculty</span>
                                </div>
                                <div class="input-div"> 
                                    <input type="text" name="Batch" required>
                                    <span>Batch</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div"> 
                                    <input type="text" name="institution" required>
                                    <span>Institution</span>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Back</button>
                                <button type="submit" class="submit_button">Submit</button>
                            </div>
                        </div>

                        <div class="popup hidden" id="successPopup">
                            <div class="popup-content">
                                <h2>Registration Successful!</h2>
                                <p>Thank you for participating, <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php if ($registrationSuccess): ?>
            document.getElementById('successPopup').style.display = 'flex';
        <?php endif; ?>
    </script>
</body>
</html>
