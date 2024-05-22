<?php
include '../connection/conn.php';
session_start();

$form_username = $_POST['username'];
$form_password = $_POST['password'];

$stmt = $conn->prepare("SELECT users.password, roles.nama_role FROM users JOIN roles ON users.role_id = roles.id WHERE users.username = ?");
$stmt->bind_param("s", $form_username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($password, $role_name);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    if ($form_password === $password) {
        $_SESSION['username'] = $form_username;
        $_SESSION['role'] = $role_name;
        if ($role_name === 'admin') {
            header("Location: ../dashboard_admin.php");
            exit();
        } elseif ($role_name === 'owner') {
            header("Location: ../dashboard_owner.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Role tidak diketahui. \n Silahkan coba lagi";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Password yang anda masukkan salah!";
        header("Location: ../index.php");
        exit();
    }
} else {
    $_SESSION['error_message'] = "Username tidak ditemukan!";
    header("Location: ../index.php");
    exit();
}

$stmt->close();
$conn->close();
?>
