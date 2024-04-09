<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDIT</title>
    <?php include "views/head.php"?>

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
        <div class="myacc">
            <i class="fa-regular fa-user"></i>
            <a href="">My account</a>
        </div>
    </section>
    <section class="women-clothes section-padding">
        <div class="women-inner module">
            <h1>Edit an item</h1>
            <?php
                $blog_id = $_GET["blog_id"];
                $blog_query = mysqli_query($con , "SELECT * FROM blogs WHERE id='$blog_id'");
                $blog = mysqli_fetch_assoc($blog_query);
            ?>
            <form class="form" action="api/blogs/edited.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="blog_id" value="<?=$blog_id?>">
                <div class="item">
                    <fieldset class="bt">
				        <input type="text" name="title" placeholder="Name of item" value="<?=$blog["title"]?>">
			        </fieldset>
                    <fieldset class="bt">
				         <input type="number" min="1" max="500" name="price" placeholder="Price" value="<?=$blog["price"]?>">
			        </fieldset>
                    <h1>Category</h1>
                    <select name="category_id" id="" class="bt">
					    <?php
						    $categ_query = Mysqli_query($con , "SELECT * FROM categories");
						    while($categ = Mysqli_fetch_assoc($categ_query)){
                                if($categ["id"] == $blog["category_id"]){
					    ?>
						    <option value="<?=$categ["id"]?>" selected><?=$categ["name"]?></option>
					    <?php
					            }else{
					    ?>
                            <option value="<?=$categ["id"]?>"><?=$categ["name"]?></option>
                        <?php
                                }
                            }
                        ?>
				    </select>
                    <h1>Class</h1>
                    <select name="classes_id" id="" class="bt">
                        <?php
						    $class_query = Mysqli_query($con , "SELECT * FROM classes");
						    while($class = Mysqli_fetch_assoc($class_query)){
                                if($class["id"] == $blog["classes_id"]){
					    ?>
						    <option value="<?=$class["id"]?>" selected><?=$class["name"]?></option>
					    <?php
						    }else{
					     ?>
                            <option value="<?=$class["id"]?>"><?=$class["name"]?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <fieldset class="inpt-img">
				        <button class="button-color input-file">
					        <input type="file" name="image">	
					        Choose a photo
				        </button>
		            </fieldset>        
                    <fieldset class="descr-area">
				        <textarea  name="description" id="" cols="30" rows="10" placeholder="Description"><?=$blog["description"]?></textarea>
			        </fieldset>
                    <fieldset class="sect-btn">
                        <button type="submit">Save</button>             
                     </fieldset>
                </div>
            </form>
        </div>
    </section>   
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
                <img src="images/edit-images/Без названия.svg" alt="">
                <p>United Kingdom | £</p>
            </div>
        </div>
    </section>
</body>
</html>