<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = new mysqli('localhost', 'root', '', 'login');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Use a SELECT query to fetch data from the table
        $stmt = $conn->prepare("SELECT * FROM register WHERE user = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User is authenticated, login successful
            echo "<script>alert('Login successfully'); window.location='index.html';</script>";
            exit();
        } else {
            // Incorrect username or password
            echo "<script>alert('Login error');window.location='login.html';</script>";
            exit();
        }

        $stmt->close();
        $conn->close();
    }
?>
