<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account</title>
    <?php include "views/head.php"; ?>
</head>
<body>
    <?php
        include "views/header.php";
        $nickname = $_GET["nickname"];
        $user_query = mysqli_query($con, "SELECT * FROM users WHERE nickname='$nickname'");
        $user = mysqli_fetch_assoc($user_query);
    ?>
    <section class="home">
        <div class="navigation-home module">
            <a href="">Women</a>
            <a href="">Men</a>
            <a href="">Baby</a>
            <a href="">Kids</a>
            <a href="">H&M HOME</a>
            <a href="">Beauty</a>
            <a href="">Sport</a>
            <a href="">Sale</a>
        </div>
        <div class="myacc">
            <i class="fa-regular fa-user"></i>
            <a href="">My account</a>
        </div>
    </section>
    <section class="inform section-padding module">
        <div class="details">
            <div class="member-set">
                <div class="page-info">
		            <div class="user-profile">
			            <img class="user-profile--ava" src="images/acc-images/avatar.jpeg" alt="">
			            <h1><?=$user["full_name"]?></h1>
			            <h2><?=$user["email"]?></h2>
                        <p>285 постов за все время</p>
                        <?php
                            if(isset($_SESSION["nickname"]) && $nickname == $_SESSION["nickname"]){
                        ?>
			                <a href=""class="button">EDIT</a>
			                <a href="api/users/signout.php" class="button button-danger"> SIGN OUT</a>
                        <?php
                            }
                        ?>
		            </div>
	            </div>
                <div class="settings white">
                    <i class="fa-solid fa-box"></i>
                    <a href="">My orders</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <div class="settings">
                    <i class="fa-solid fa-star"></i>
                    <a href="">My Points</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <div class="settings white">
                    <i class="fa-regular fa-user"></i>
                    <a href="">Membership</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <div class="settings">
                    <i class="fa-solid fa-user-group"></i>
                    <a href="">Invite a friend</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <?php
                    if(isset($_SESSION["nickname"]) && $nickname == $_SESSION["nickname"]){
                ?>
                <div class="settings white">
                    <i class="fa-solid fa-plus"></i>
                    <a href="<?=$BASE_URL?>/section.php">Add an item</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <div class="settings">
                    <i class="fa-regular fa-user"></i>
                    <a href="">My blogs</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <?php
                    }else{
                ?>
                <div class="settings">
                    <i class="fa-solid fa-user-group"></i>
                    <a href="">Other blogs</a>
                    <i id="icon" class="fa-solid fa-angle-right"></i>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="blogs">
                <?php
                    $blogs_query = mysqli_query($con , "SELECT b.* , u.nickname , c.name , l.name as class_name FROM
                    blogs b INNER JOIN users u ON b.author_id=u.id INNER JOIN categories c ON b.category_id=c.id 
                    INNER JOIN classes l ON b.classes_id=l.id WHERE u.nickname = '$nickname'");
                    if(mysqli_num_rows($blogs_query) > 0){
                    while($blog = Mysqli_fetch_assoc($blogs_query)){
                ?>
                <div class="blog-item">
                    <img class="blog-item--img" src="<?=$blog["image"]?>" alt="">
                    <div class="blog-header">
                        <h3><?=$blog["title"]?></h3>
                    </div>
                    <p class="blog-desc"><?=$blog["description"]?></p>
                    <p class="blog-desc"><?=$blog["class_name"]?></p>
                    <p class="blog-desc">Price: <?=$blog["price"]?>$</p>
                    <div class="blog-info">
                        <span class="link">
                            <?=$blog["name"]?>
                        </span>
                        <a class="link" href="<?=$BASE_URL?>/account.php?nickname=<?=$blog["nickname"]?>">
                            <?=$blog["nickname"]?>
                        </a>
                    </div>
                    <?php
                        if(isset($_SESSION["nickname"]) && $nickname == $_SESSION["nickname"]){
                    ?>
                    <span class="link">
                        <ul class="dropdown">
                            <li><a href="<?=$BASE_URL?>/edit.php?blog_id=<?=$blog["id"]?>">EDIT</a></li>
                            <li><a href="api/blogs/delete.php?blog_id=<?=$blog["id"]?>" class="danger">DELETE</a></li>
                        </ul>
                    </span>
                    <?php
                        }
                    ?>
                </div>
                <?php
                        }
                    }else{
                ?>
            
                <h3>0 blogs</h3>

                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <section class="information section-padding">
        <div class="information-inner module">
            <div class="shop-info">
                <div class="info">
                    <h1>SHOP</h1>
                    <p>Women</p>
                    <p>Men</p>
                    <p>Baby</p>
                    <p>Kids</p>
                    <p>H&M HOME</p>
                    <p>Beauty</p>
                    <p>Sport</p>
                </div>
                <div class="info">
                    <h1>CORPORATE INFO</h1>
                    <p>Career at H&M</p>
                    <p>About H&M group</p>
                    <p>Sustainability</p>
                    <p>Press</p>
                    <p>Investor Relations</p>
                    <p>Corporate Governance</p>
                </div>
                <div class="info">
                    <h1>HELP</h1>
                    <p>Customer Service</p>
                    <p>My Account</p>
                    <p>Store Locator</p>
                    <p>Legal & Privacy</p>
                    <p>Contact</p>
                    <p>Gift Cards</p>
                    <p>Cookie Settings</p>
                </div>
                <div class="info">
                    <h1>JOIN NOW</h1>
                    <h3>Become a member today and get 10% off your first purchase</h3>   
                    <a href="">READ MORE</a>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </div>
            <div class="social-media">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-pinterest"></i>
            </div>
            <div class="footer">
                <p>The content of this site is copyright-protected and is the property of H&M Hennes & Mauritz AB. H&M's business concept is to offer fashion and quality at the best price in a...</p>
                <a href="">Read more</a>
            </div>
            <div class="footer-img">
                <img src="images/acc-images/hennes-mauritz.svg" alt="">
                <p>United Kingdom | £</p>
            </div>
        </div>
    </section>
</body>
</html>