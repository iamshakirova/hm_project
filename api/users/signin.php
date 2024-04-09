<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";
    if(isset($_POST["email"] , $_POST["password"]) && strlen ($_POST["email"]) > 2 && 
        strlen ($_POST ["password"]) > 2)
    {
        $email = $_POST["email"];
        $password = $_POST['password'];
        $check_user = mysqli_query($con , "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($check_user)== 0){
            header("Location:$BASE_URL/login.php?error=4");
            exit();
        }
        $user = mysqli_fetch_assoc($check_user);
        $hash = sha1($password);
        if($user["password"] !=$hash){
            header("Location:$BASE_URL/login.php?error=5");
            exit();
        }
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["nickname"] = $user["nickname"];
        $nickname = $user["nickname"];
        header("Location:$BASE_URL/account.php?nickname=$nickname");
    }else{
        header("Location:$BASE_URL/login.php?error=1");
    }