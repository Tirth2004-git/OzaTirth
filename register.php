<?php
$conn = new mysqli("localhost", "root", "", "user_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    
    echo "<script>alert('Registration successful! Please login.'); window.location='login.php';</script>";
}

$username = isset($_GET['user']) ? $_GET['user'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>
        <form action="" method="post" class="space-y-4">
            <input type="text" name="username" placeholder="Username" value="<?= $username ?>" required class="w-full p-2 border rounded">
            <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded">
            <input type="password" name="password" placeholder="Password" required  class="w-full p-2 border rounded">
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Register</button>
        </form>
    </div>
</body>
</html>
