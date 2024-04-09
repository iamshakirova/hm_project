<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";
    session_start();

    if(isset($_GET["blog_id"]) && intval($_GET["blog_id"])){
        $blog_id = $_GET["blog_id"];
        $author_id = $_SESSION["id"];
        mysqli_query($con , "DELETE FROM blogs WHERE id = '$blog_id' AND author_id = '$author_id'");
        $nickname = $_SESSION["nickname"];
        header("Location: $BASE_URL/account.php?nickname=$nickname");
    }else{
        $nickname = $_SESSION["nickname"];
        header("Location:$BASE_URL/account.php?error=1&nickname=$nickname");
    }