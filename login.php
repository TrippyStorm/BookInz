<?php
session_start();
require_once 'includes/config_new.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die('Please fill all required fields.');
    }

    // Fetch user by email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND is_active = 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        // Redirect to homepage or dashboard
        header('Location: index.php');
        exit;
    } else {
        die('Invalid email or password.');
    }
} else {
    die('Invalid request method.');
}
?>
