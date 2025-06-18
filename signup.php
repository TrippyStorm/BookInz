<?php
require_once 'includes/config_new.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        die('Please fill all required fields.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    if ($password !== $confirm_password) {
        die('Passwords do not match.');
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        die('Email already registered.');
    }

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password, is_verified, is_active, created_at) VALUES (:name, :email, :phone, :password, 0, 1, NOW())");
    $result = $stmt->execute([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => $password_hash
    ]);

if ($result) {
    require_once 'Admin/notification_helper.php';
    addNotification("New user registered: $name ($email)");
    // Redirect or show success message
    header('Location: index.php?signup=success');
    exit;
} else {
    die('Error registering user.');
}
} else {
    die('Invalid request method.');
}
?>
