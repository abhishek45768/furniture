<?php
    $username = $_POST['username'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $password2=$_POST['password2'];
    $conn = new mysqli('localhost', 'root', '', 'login');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
      
    } else {
        $stmt = $conn->prepare("INSERT INTO register (user,email, password,password2) VALUES (?, ?,?,?)");
        $stmt->bind_param("ssss", $username,$email, $password,$password2,); 
        if($password==$password2){
        if ($stmt->execute()) {
            echo "<script>alert('register successfully'); window.location='login.html';</script>";
        } 
    }
    else {
            echo "<script>alert('Failed to register'); window.location='register.html';</script>"  . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
