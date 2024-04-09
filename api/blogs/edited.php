<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";
    if(isset($_POST["title"] , $_POST["description"] , $_POST["price"] , $_POST["category_id"] , $_POST["classes_id"] , $_POST["blog_id"]) &&
        strlen($_POST["title"]) > 0 &&
        strlen($_POST["description"]) > 0 &&
        strlen($_POST["price"]) > 0 &&
        intval($_POST["category_id"]) &&
        intval($_POST["classes_id"]) &&
        intval($_POST["blog_id"]))
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $categ_id = $_POST["category_id"];
        $classes_id = $_POST["classes_id"];
        $blog_id = $_POST["blog_id"];
        session_start();
        $author_id = $_SESSION["id"];
        if(isset($_FILES["image"]) && isset($_FILES["image"]["name"]) &&
        strlen($_FILES["image"]["name"]) > 3){
            $ext = end(explode("." , $_FILES["image"]["name"]));
            $image_name = time().".".$ext;
            move_uploaded_file($_FILES["image"]["tmp_name"] , "../../images/blogs/$image_name");
            $path = "images/blogs/$image_name";
            mysqli_query($con , "UPDATE blogs SET title='$title' , description = '$description' , price ='$price',
            category_id = '$categ_id' , classes_id = '$classes_id' , image = '$path' WHERE id = '$blog_id'");
        }else{
            mysqli_query($con , "UPDATE blogs SET title='$title' , description = '$description' , price ='$price',
            category_id = '$categ_id' , classes_id = '$classes_id'  WHERE id = '$blog_id'");
        }
        $nickname = $_SESSION["nickname"];
        header("Location:$BASE_URL/account.php?nickname=$nickname");
    }else{
        $blog_id = $_POST["blog_id"];
        header("Location:$BASE_URL/edit.php?error=1&blog_id=$blog_id");
    }