<?php
session_start();
include "../db_conn.php";

if (isset($_POST['username']) && 
    isset($_POST['password']) &&
    isset($_POST['role'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $userneme = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty ($userneme)){
        header("Location: ../index.php?error=帳號不可為空白");
    }else if (empty ($password)){
        header("Location: ../index.php?error=密碼不可為空白");
    }else {
        
        // Hashing the password
        $password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username='$userneme'
                AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1){
            //the user name must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password && $row['role'] 
                == $role){
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../home.php");
            } else {
                header("Location: ../index.php?error=不正確的帳號密碼或使用者權限，請重新輸入!!");
            }
        }  else {
            header("Location: ../index.php?error=不正確的帳號密碼或使用者權限，請重新輸入!!");
        }
    }

} else {
    header("Location: ../index.php");
}