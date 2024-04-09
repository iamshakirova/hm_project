<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";
    if(isset($_POST["title"] , $_POST["description"] , $_POST["price"] , $_POST["category_id"] , $_POST["classes_id"]) &&
        strlen($_POST["title"]) > 0 &&
        strlen($_POST["description"]) > 0 &&
        strlen($_POST["price"]) > 0 &&
        intval($_POST["category_id"]) &&
        intval($_POST["classes_id"]))
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $categ_id = $_POST["category_id"];
        $classes_id = $_POST["classes_id"];
        session_start();
        $author_id = $_SESSION["id"];
        if(isset($_FILES["image"]) && isset($_FILES["image"]["name"]) &&
        strlen($_FILES["image"]["name"]) > 3){
            $ext = end(explode("." , $_FILES["image"]["name"]));
            $image_name = time().".".$ext;
            move_uploaded_file($_FILES["image"]["tmp_name"] , "../../images/blogs/$image_name");
            $path = "images/blogs/$image_name";
            mysqli_query($con , "INSERT INTO blogs (title , description , price , category_id , classes_id , author_id , image) VALUES ('$title' , '$description' , '$price' , '$categ_id' , '$classes_id' , '$author_id' , '$path')");
        }else{
            mysqli_query($con , "INSERT INTO blogs (title , description , price , category_id , classes_id , author_id) VALUES ('$title' , '$description' , '$price' , '$categ_id' , '$classes_id' , '$author_id')");
        }
        $nickname = $_SESSION["nickname"];
        header("Location:$BASE_URL/account.php?nickname=$nickname");
    }else{
        header("Location:$BASE_URL/section.php?error=1");
    }