<?php
include ('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT `password` FROM `tbl_user` WHERE `username` = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($password === $stored_password) {
        echo "
        <script>
            alert('Login Successfully!');
            window.location.href = 'http://localhost/codetester/universal.html';
        </script>
        "; 
    } else {
        echo "
        <script>
            alert('Login Failed, Incorrect Password!');
            window.location.href = 'http://localhost/home.php';
        </script>
        ";
    }
} else {
    echo "
        <script>
            alert('Login Failed, User Not Found!');
            window.location.href = 'http://localhost/home.php';
        </script>
        ";
}
}

?>