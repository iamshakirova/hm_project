<?php
	include "config/db.php";
	$sql = "SELECT b.* , u.nickname , c.name , l.name as class_name FROM blogs b INNER JOIN users u ON 
	b.author_id=u.id INNER JOIN categories c ON b.category_id=c.id INNER JOIN classes l ON b.classes_id=l.id";
	$limit =3;
	$sql_count = "SELECT CEIL(COUNT(*) / $limit) AS total FROM blogs b INNER JOIN users u 
	ON b.author_id = u.id INNER JOIN categories c ON b.category_id = c.id INNER JOIN classes l ON b.classes_id=l.id";
	if(isset($_GET["categ"]) && intval($_GET["categ"])){
		$categ = $_GET["categ"];
		$sql.=" WHERE c.id = $categ";
        $sql_count.= " WHERE c.id=$categ";
	}
    if(isset($_GET["search"]) && strlen ($_GET["search"]) > 0){
        $search = strtolower($_GET["search"]);
        $sql.=" WHERE LOWER(b.title) LIKE '%$search%' OR LOWER(b.description) LIKE '%$search%'";
        $sql_count.=" WHERE LOWER(b.title) LIKE '%$search%' OR LOWER(b.description) LIKE '%$search%'";
    }

    if(isset($_GET["page"]) && intval($_GET["page"])){
        $page = $_GET["page"];
        $skip = $limit * ($page - 1);
        $sql.= " LIMIT $skip , $limit";
    }else{
        $sql.= " LIMIT $limit";
    }
	$blogs_query = mysqli_query($con , $sql);
    $page_query = mysqli_query($con , $sql_count);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>H&M | Online Fashion, Homeware & Kids Clothes | H&M GB</title>
    <?php include "views/head.php"?>
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="stylesheet" href="slick/slick.css">
</head>
<body>
    <?php
        include "views/header.php";
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
        <div class="knit-inner module">
            <img src="images/mainpage-images/hmgoepprod (1).jpeg" alt="">
            <div class="inner-text">
                <h1>Knits with a twist</h1>
                <p>New textures that look as good as they feel.</p>
                <button>Shop now</button>
            </div>
        </div>
    </section>
    <section class="new-arrivals section-padding">
        <div class="arrivals-inner module">
            <h1>Just in: Shop new arrivals</h1>
                <?php
			        $class_query = Mysqli_query($con , "SELECT * FROM classes");
			        while($class = Mysqli_fetch_assoc($class_query)){
		        ?>
                        <a href=""><?=$class["name"]?></a>
                <?php
                    }
                ?>
        </div>
    </section>
    <section class="trends section-padding">
        <div class="trending-inner module">
            <h1>Trending categories</h1>
            <div class="recent-trends">
                <?php
			        $categ_query = Mysqli_query($con , "SELECT * FROM categories");
			        while($categ = Mysqli_fetch_assoc($categ_query)){
		        ?>
		            <div class="trend-sections">
                        <img src="<?=$categ["image"]?>" alt="">
                        <a href="<?=$BASE_URL?>/?categ=<?=$categ["id"]?>">
                            <p><?=$categ["name"]?></p>
                        </a>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <section class="blog-inner section-padding">
        <h1>BLOG</h1>
        <form class="base-input-index" method="GET">
            <div class="blog-in">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input name="search" type="text" placeholder="Blog search">
            </div>
            <div class="button-in">
                <button>Search</button>
            </div>
        </form>
        <div class="blog module">
            <?php
                if(mysqli_num_rows($blogs_query) > 0){
                while($blog = Mysqli_fetch_assoc($blogs_query)){
            ?>
            <div class="blogs-item">
                <img class="blog-item--img" src="<?=$blog["image"]?>" alt="">
                <div class="blog-header">
                    <h3><?=$blog["title"]?></h3>
                </div>
                <p class="blog-desc"><?=$blog["description"]?></p>
                <p class="blog-desc"><?=$blog["class_name"]?></p>
                <p class="blog-desc">Price: <?=$blog["price"]?>$</p>

                <div class="blogs-info">
                    <span class="link">
                        <?=$blog["name"]?>
                    </span>
                    <a class="link" href="<?=$BASE_URL?>/account.php?nickname=<?=$blog["nickname"]?>">By: 
                        <?=$blog["nickname"]?>
                    </a>
                </div>
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
        <div class="pages module">
            <?php
                $categ_txt=null;
                if(isset($_GET["categ"]) && strlen($_GET["categ"]) > 0){
                    $categ = $_GET["categ"];
                    $categ_txt = "&categ=$categ";
                }
                $search_txt = null;
                if(isset($_GET["search"]) && strlen($_GET["search"]) > 0){
                    $sea = $_GET["search"];
                    $search_txt = "&search=$sea";
                }
                $page = mysqli_fetch_assoc($page_query);
                for($i = 1; $i <= $page["total"]; $i++){
            ?>
                    <a href="<?=$BASE_URL?>/?page=<?=$i?><?=$categ_txt?><?=$search_txt?>"><?=$i?></a>
            <?php
                }
            ?>
        </div>
    </section>
    <section class="hm-home section-padding">
        <div class="hm-inner module">
            <img src="images/mainpage-images/H&M_home.jpeg" alt="">
            <div class="hm-txt">
                <h1>A return to glamour</h1>
                <p>Elevate your home with our latest Classic Collection drop.</p>
                <button>Shop now</button>
            </div>
        </div>
    </section>
    <section class="hm-outdoors section-padding">
        <div class="outdoors-inner module">
            <img src="images/mainpage-images/outdoors.jpeg" alt="">
            <div class="outdoors-txt">
                <h1>Let's go outdoors</h1>
                <p>Smart layers & StormMove™ jackets technically designed for outdoor adventures, whatever the weather. However You Move.</p>
                <div class="button-out">
                    <button>Women</button>
                    <button>Men</button>
                </div>
            </div>
        </div>
    </section>
    <section class="arrival-img section-padding">
        <div class="arrival-img-inner module">
            <h1>New Arrivals</h1>
            <div class="arrivals-section">
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img1.jpeg" alt="">
                    <h1>Oversized polo-neck jumper</h1>
                    <p>£24.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img2.jpeg" alt="">
                    <h1>Oversized polo-neck jumper</h1>
                    <p>£24.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img3.jpeg" alt="">
                    <h1>Puffer coat</h1>
                    <p>£39.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img4.jpeg" alt="">
                    <h1>Rib-knit dress</h1>
                    <p>£39.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img5.jpeg" alt="">
                    <h1>Rib-knit dress</h1>
                    <p>£27.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img6.jpeg" alt="">
                    <h1>Zip-top rib-knit jumper</h1>
                    <p>£34.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/arrival-img7.jpeg" alt="">
                    <h1>Crew-neck sweatshirt</h1>
                    <p>£17.99</p>
                </div>
                <div class="arrivals-img">
                    <img src="images/mainpage-images/trend-img9.jpeg" alt="">
                    <h1>Biker Jacket</h1>
                    <p>50.99</p>
                </div>
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
                <img src="images/mainpage-images/footer.svg" alt="">
                <p>United Kingdom | £</p>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/mainpage.js"></script>
    <script src="js/imgarrivals.js"></script>
</body>
</html>