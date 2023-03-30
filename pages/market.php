<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" href="../style/market.css">
	<title>FastDev</title>
</head>
<body>
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
				<a class="hero-banner-title" href="../pages/team.html">Equipe</a>
				<a class="hero-banner-title">Support</a>
				<a class="hero-banner-title">Feedback</a>
				<a class="hero-banner-title hero-right"href="../pages/shopping-cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
			</div>
		</div>
	</header>
	
	<?php
		require('db.php');

		$query = "SELECT * FROM `market`";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
		$rows = mysqli_num_rows($result);
		
		$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

	?>
	
	
	<section class="container">
		<div class="titre">
			<h1>Le <a>meilleur</a> site</h1>
			<h1>de formation</h1>
			<h1>en ligne</h1>
			<p>Plus de 400 formations en ligne, les prix les abordables du marché !</p>
			<a href="#section2" class="button">Commencer<i class="fa-solid fa-arrow-right"></i></a>
		</div>
		<img src="../images/Market/main.png">
	</section>

	<section class="last_drop" id="section2">
		<div class="drop_card">
			<?php

                if(isset($_GET['send'])){
                    $product = $_GET['send'];
                    $product = array(
                        "name" => $row['name'],
                        "image" => $row['image'],
                        "description" => $row['description'],
                        "price" => $row['price'],
                        "difficulte" => $row['lvl']
                    );
                    $query2 = "INSERT INTO `market` (name, image, description, price, lvl) VALUES ('" . $product['name'] . "', '" . $product['image'] . "', '" . $product['description'] . "', '" . $product['price'] . "', '" . $product['difficulte'] . "')";
                    $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
                    header("Location: market.php");
                }

				for($i = 0; $i < $rows;$i++){
                    $row = $result[$i];
                    $product = array(
                        "name" => $row['name'],
                        "image" => $row['image'],
                        "description" => $row['description'],
                        "price" => $row['price'],
                        "difficulte" => $row["lvl"]
                    );

                    echo "<div class='drop'>
                            <img src='" . $product['image'] . "' alt ='" . $product['name'] . "'>
                            <p>" . $product['difficulte'] . "</p>
                            <h2>" . $product['name'] . "</h2>
                            <p>" . $product['description'] . "</p>
                            <div class='price'>
                                <p>" . $product['price'] . "$</p>
                            </div>
                            <button class='add_card'><a href='market.php?send=". urlencode(json_encode($product)) ."'>Add card</a></button>
                        </div>";
                }
			?>
		</div>
	</section>
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
	<script src="../script/main.js"></script>
</body>
</html>