<?php
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

if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = hash('md5',$_POST["password"]);
    $confirm_password = $_POST["confirm_password"];

    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        $message = "Email Already Exists";
    }else {
        $sql = "INSERT INTO users(email, name, password) VALUES ('$email', '$name', '$password')";
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
    <h2>Sign Up</h2>
    <b>
        <?php if($message !== "")
        {
            echo $message;
        }
        ?>
        </b>
    <form action="signup_handler.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
<?php include 'footer.php'; ?>
