<?php
session_start(); // Start the session

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

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password =hash('md5',$_POST["password"]);
    

    $sql = "SELECT name FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name']; 
        
        $_SESSION['name'] = $name;
        
        // Redirect to the welcome page
        header("Location: about-us.php");
        exit();
    } else {
        $message = "Invalid email or password.";
    }
    
    $conn->close();
}
?>

<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>Sign In</h2>
    <b>
        <?php if($message !== "")
        {
            echo $message;
        }
        ?>
        </b>
    <form action="signin.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>
<?php include 'footer.php'; ?>
