<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myevent";
$port = 3307;

try {
    // Create a new PDO connection with port specified
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data and sanitize it
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check kalau email tu dah memang ada ke tidak
        $checkEmailSql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($checkEmailSql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check email ada ke x sini
        if ($stmt->rowCount() > 0) {
            // kalau ade display mesej ni
            echo "This email is already registered. Please use a different email. <a href='register.html'><br><br>Back to Register</a>";
        } else {
            // kalau email tu x de, baru masukkan sume data2 tu kedalam database pakai INSERT statement.
            $sql = "INSERT INTO users (name, email, phone, address, password) VALUES (:name, :email, :phone, :address, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                echo "Registration successful! <a href='login.php'><br><br>Back to Login</a>";
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the connection
$conn = null;
