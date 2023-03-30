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
	<?php

		require('db.php');

		$query = "SELECT * FROM `market`";
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

		if(isset($_GET['send_values'])){
			
			$product = $_GET['send_values'];
			$product = explode("°", $product);
			$name = $product[0];
			$image = $product[1];
			$price = $product[2];

			$query3 = "INSERT `panier`(`name`, `image`, `price`, `quantity`) VALUES ('$name', '$image', '$price', '1') ON DUPLICATE KEY UPDATE quantity = quantity + 1";
			$result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
			header("Location: market.php");
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

				for($i = 0; $i < $rows;$i++){
                    $row = $result[$i];
                    $product = array(
                        "name" => $row['name'],
                        "image" => $row['image'],
                        "description" => $row['description'],
                        "price" => $row['price'],
                        "difficulte" => $row["lvl"]
                    );

					$send_values = $product['name'] . "°" . $product['image'] . "°" . $product['price'];

					if ($total_products < 15) {
						echo "<div class='drop'>
                            <img src='" . $product['image'] . "' alt ='" . $product['name'] . "'>
                            <p>" . $product['difficulte'] . "</p>
                            <h2>" . $product['name'] . "</h2>
                            <p>" . $product['description'] . "</p>
                            <div class='price'>
                                <p>" . $product['price'] . " €</p>
                            </div>
                            <a href='market.php?send_values=" . $send_values . "' class='button'>Ajouter au panier<i class='fa-solid fa-arrow-right'></i></a>
						</div>";
					} else {
						echo "<div class='drop'>
                            <img src='" . $product['image'] . "' alt ='" . $product['name'] . "'>
                            <p>" . $product['difficulte'] . "</p>
                            <h2>" . $product['name'] . "</h2>
                            <p>" . $product['description'] . "</p>
                            <div class='price'>
                                <p>" . $product['price'] . " €</p>
                            </div>
                            <a class='button' style='text-align: center;'>Trop d'articles dans le panier !</a>
						</div>";
					}

                    
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