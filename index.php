<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="assets/logo.png">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <img src="assets/login-secure.png" alt="login icon" class="login-secure">
        <div class="login-header">Login</div>
        <div class="login-subtitle">Welcome back! Please enter your details.</div>
        <form action="php/login.php" method="post">
            <div class="input-group">
                <div class="input-label">Username</div>
                <div class="input-container">
                    <img src="assets/username-icon.png" alt="User Icon" class="icon">
                    <input type="text" name="username" placeholder="Type your username" required>
                </div>
            </div>
            <div class="input-group">
                <div class="input-label">Password</div>
                <div class="input-container">
                    <img src="assets/password-icon.png" alt="Password Icon" class="icon">
                    <input type="password" name="password" placeholder="Type your password" required>
                </div>
            </div>
            <div class="remember-me-container">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Remember me</label>
            </div>
            <button type="submit" class="login-button">Sign in</button>
        </form>
    </div>

    <!-- Modal Pop-up -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="assets/invalid-icon.png" alt="invalid-img" class=invalid-img>
            <p id="modalMessage">Username/password yang Anda masukkan salah.</p>
            <button id="modalButton">OK</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");

            form.addEventListener("submit", function(event) {
                const username = document.querySelector("input[name='username']").value;
                const password = document.querySelector("input[name='password']").value;
                // Username and password is required
                if (username === "" || password === "") {
                    event.preventDefault(); 
                    alert("Please fill out both the username and password fields.");
                }
            });

            var errorMessage = "<?php
                session_start();
                if (isset($_SESSION['error_message'])) {
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']); // Clear the error message
                }
            ?>";
            if (errorMessage) {
                document.getElementById('modalMessage').innerText = errorMessage;
                document.getElementById('myModal').style.display = "block";
            }

            // Get the modal and modal button elements
            var modal = document.getElementById("myModal");
            var modalButton = document.getElementById("modalButton");

            // When the user clicks the button, close the modal
            modalButton.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        });
    </script>
</body>
</html>
