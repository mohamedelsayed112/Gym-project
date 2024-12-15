<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:index.php");
    exit();
}

$servername = "127.0.0.1"; 
$username = "root";
$password = "";
$dbname = "gym_project";

$message = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["email"]) && isset($_POST["message"])) {
    $email = $_POST["email"];
    $message = $_POST["message"];

    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $sql = "INSERT INTO messages(message, user_id) VALUES ('$message', '$user_id')";
        if ($conn->query($sql) === TRUE) {
            $message = "New record created successfully";
        }else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>Contact Us</h2>
    <form action="contact-us.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
<?php include 'footer.php'; ?>
