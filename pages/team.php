<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Team</title>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/team.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">  
    <link rel="icon" href="../images/fav-icon.png">s
</head>

<body>
<?php

require('db.php');

$query = "SELECT * FROM `panier`";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$rows = mysqli_num_rows($result);

$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query2 = "SELECT `quantity` FROM `panier`";
$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
$rows2 = mysqli_num_rows($result2);

$total_products = 0;
for ($i = 0; $i < $rows2; $i++) {
    $total_products += mysqli_fetch_array($result2)[0];
}
?>
    <header>
		<div class="hero-banner-content">
			<div class="hero-bannner-logo">
				<img src="../images/Logo.png" alt="logo">
			</div>
			<div class="menu">
				<i class="fa-solid fa-bars" id="open" onclick="navbar_open()"></i>
				<i class="fa-solid fa-xmark" id="close" onclick="navbar_close()"></i>
			</div>
			<div class="hero-banner-titles">
				<a class="hero-banner-title" href="../pages/market.php">Produits</a>
				<a class="hero-banner-title" href="../pages/team.php">Equipe</a>
				<a class="hero-banner-title">Support</a>
				<a class="hero-banner-title">Feedback</a>
				<a class="hero-banner-title hero-right"href="../pages/shopping-cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
				<div class="red_bubble"><?php echo $total_products ?></div>
				

			</div>
		</div>
	</header>
    <section id="equipe">
        <div class="barreTeam">
            <h1 class="equipe-title">La Team</h1>
            <div class="buttons">
                <button type="submit" id="button_add">Ajouter<i class="fa-solid fa-plus"></i></button>

            </div>
        </div>
        <div class="equipe-membre">


        </div>


    </section>



    <div class="containerForm">
    <form id="hidden" action=".ficheMembre" method="post">
        <div class="contenuForm">
            <h2>Informations</h2>

            <input type="text" id="name" name="user_name" placeholder="Prénom">
            <input type="email" id="email" name="user_email" placeholder="Email">
            <input type="text" id="description" placeholder="Description">


            <div id="radioAvatar">

                <div class="image-container">
                    <input type="radio" id="imageProfile1" name="radioChoice" value="../images/icon/user1.png">
                    <label for="imageProfile1"><img src="../images/icon/user1.png" class="iconRadio" alt="user1"></label>
                </div>
                <div class="image-container">
                    <input type="radio" id="imageProfile3" name="radioChoice" value="../images/icon/user3.png">
                    <label for="imageProfile3"><img src="../images/icon/user3.png" class="iconRadio" alt="user3"></label>
                </div>
                <div class="image-container">
                    <input type="radio" id="imageProfile4" name="radioChoice" value="../images/icon/user4.png">
                    <label for="imageProfile4"><img src="../images/icon/user4.png" class="iconRadio" alt="user4"></label>
                </div>
                <div class="image-container">
                    <input type="radio" id="imageProfile6" name="radioChoice" value="../images/icon/user6.png">
                    <label for="imageProfile6"><img src="../images/icon/user6.png" class="iconRadio" alt="user6"></label>
                </div>
                <div class="image-container">

                    <input type="radio" id="imageProfile7" name="radioChoice" value="../images/icon/user7.png">
                    <label for="imageProfile7"><img src="../images/icon/user7.png" class="iconRadio" alt="user7"></label>
                </div>
                <div class="image-container">
                    <input type="radio" id="imageProfile10" name="radioChoice" value="../images/icon/user10.png">
                    <label for="imageProfile10"><img src="../images/icon/user10.png" class="iconRadio" alt="user10"></label>
                </div>
            </div>

            <button type="button" class="buttonForm" onclick="addMember()">Bienvenue <i class="fa-solid fa-check"></i></button>
        </div>
    </div>
    </form>






    <footer>
        <div class="hero-footer-top-content">
            <div class="hero-footer-logo">
                <a href="market.html"><img src="../images/Logo.png" alt="logo"></a>
            </div>
            <div class="hero-footer-contact">
                <div class="full-button">
                    <input type="text" placeholder="Entrez votre email">
                    <button>S'abonner</button>
                </div>
            </div>
        </div>
        <div class="hero-footer-botttom-content">
            <p>© 2023 Cefim. Tous droits réservés.</p>
        </div>
    </footer>
    <script src="../script/team.js"></script>
    <script src="../script/main.js"></script>
</body>



</html>