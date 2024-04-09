<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
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
    </section>
    <section class="modalw">
        <div class="modal-window" id="modal">
            <form class="modal-content" action="api/users/signup.php" method = "POST">
                    <h1>Registration</h1>
                    <input type="email" placeholder="Enter E-mail" name="email" id="">
                    <input type="text" placeholder="Full name" name="full_name" id="">
                    <input type="text" placeholder="Nickname" name="nickname">
                    <input type="password" placeholder="Create a password" name="password">
                    <input type="password" placeholder="Confirm the password" name ="password2">
                    <button type ="submit">Registration</button>
            </form>
         <?php
            if(isset($_GET["error"]) && $_GET ["error"] == 1){
        ?>
            <p class="text-danger">Заполните все поля</p>
        <?php
            }else if(isset($_GET["error"]) && $_GET["error"] == 2){
        ?>
            <p class="text-danger">Пароли не совпадают</p>
        <?php
            }else if(isset($_GET["error"]) && $_GET["error"] == 3){
        ?> 
            <p class="text-danger">Такой пользователь уже зарегистрирован</p>
        <?php
            }
        ?>
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
                <img src="images/login-images/footer.svg" alt="">
                <p>United Kingdom | £</p>
            </div>
        </div>
    </section>
</body>
</html>