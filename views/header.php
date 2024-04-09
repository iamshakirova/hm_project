<?php 
    include "config/baseurl.php";
    include "config/db.php";
?>
<header>
        <div class="head-menu">
            <a href="">Customer Service</a>
            <a href="">Store Locator</a>
            <a href="">Newsleter</a>
            <i class="fa-solid fa-ellipsis"></i>
        </div>
        <div class="logo">
            <i class="fa-solid fa-bars"></i>
            <a href="<?=$BASE_URL?>/">
                <img src="images/mainpage-images/H&M-Logo.svg.png" alt="">
            </a>
        </div>
            <?php
                session_start();
                if(isset($_SESSION["id"])){
            ?>
            <a href="<?= $BASE_URL ?>/account.php?nickname=<?=$_SESSION["nickname"]?>">
            	<img class="avatar" src="images/acc-images/avatar.jpeg" alt="Avatar">
        	</a>
		<?php
			}else{
		?>
            <div class="head-menu-r">
                <a href="<?=$BASE_URL?>/register.php">Registration</a>
                <a href="<?=$BASE_URL?>/login.php">log in</a>
                <a href="">Shopping bag</a>
            </div>
        <?php
            }
        ?>
</header>
