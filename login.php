<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.html"); 
            exit();
        } else {
            echo "<script>alert('Incorrect Password!');</script>";
        }
    } else {
        header("Location: register.php?user=$username");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
        <form action="" method="post" class="space-y-4">
            <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded">
            <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
        </form>
    </div>
</body>
</html>
