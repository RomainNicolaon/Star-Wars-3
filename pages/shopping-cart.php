<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <script src="https://kit.fontawesome.com/6cba33bc0d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/shopping-cart.css">
    <link rel="icon" href="../images/fav-icon.png">
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
				<a class="hero-banner-title" href="../pages/team.html">Equipe</a>
				<a class="hero-banner-title">Support</a>
				<a class="hero-banner-title">Feedback</a>
				<a class="hero-banner-title hero-right"href="../pages/shopping-cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
				<div class="red_bubble"><?php echo $total_products ?></div>
				

			</div>
		</div>
	</header>

    <section class="shopping-cart">
        <h1>Panier</h1>
        <hr class="shopping-cart-separator">
        <section class="products">
            <?php

                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "DELETE FROM `panier` WHERE `id` = $id";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    header("Location: shopping-cart.php");
                }

                if(isset($_GET['delete'])) {
                    $delete = $_GET['delete'];
                    if ($delete == 1) {
                        $query = "DELETE FROM `panier` WHERE 1";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        header("Location: shopping-cart.php");
                    }
                }

                if(isset($_GET['add'])) {
                    $id = $_GET['add'];
                    $query = "UPDATE `panier` SET `quantity` = `quantity` + 1 WHERE `id` = $id";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    header("Location: shopping-cart.php");
                }

                if(isset($_GET['del'])) {
                    $id = $_GET['del'];
                    $query = "UPDATE `panier` SET `quantity` = `quantity` - 1 WHERE `id` = $id";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $query2 = "SELECT `quantity` FROM `panier` WHERE `id` = $id";
                    $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
                    $result2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                    if ($result2[0]['quantity'] == 0) {
                        $query3 = "DELETE FROM `panier` WHERE `id` = $id";
                        $result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
                    }
                    header("Location: shopping-cart.php");
                }

                $total_price = 0;
                for ($i = 0; $i < $rows; $i++) {
                    $row = $result[$i];
                    $product = array(
                        "id" => $row['id'],
                        "name" => $row['name'],
                        "image" => $row['image'],
                        "description" => $row['description'],
                        "price" => $row['price'],
                        "quantity" => $row['quantity']
                    );

                    echo "<div class='product'>
                        <div class='product-image'>
                            <img src='" . $product['image'] . "' alt='" . $product['name'] . "'>
                        </div>
                        <div class='product-info'>
                            <h2>" . $product['name'] . "</h2>
                            <p>" . $product['description'] . "</p>
                        </div>
                        <div class='product-price'>
                            <h3>Prix : " . $product['price'] . " €</h3>
                        </div>
                        <div class='product-quantity'>
                            <h3>Quantité : " . $product['quantity'] . "<a class='add_product' href='shopping-cart.php?add=" . $product['id'] . "'><i class='fa-solid fa-plus'></i></a><a class='del_product' href='shopping-cart.php?del=" . $product['id'] . "'><i class='fa-solid fa-minus'></i></a></h3>
                        </div>
                        <div class='product-remove'>
                        <a href='shopping-cart.php?id=" . $product['id'] . "'><button class='remove-article'>Remove <i class='fa-solid fa-trash'></i></button></a>
                        </div>
                    </div>";

                    $total_price += $product['price'] * $product['quantity'];
                }

                if ($rows == 0) {
                    echo "<h2>Votre panier est vide.</h2>";
                }
            ?>
        </section>
    </section>

    <section class="checkout">
        <?php

            $query4 = "SELECT * FROM `promo`";
            $result4 = mysqli_query($con, $query4) or die(mysqli_error($con));
            $rows4 = mysqli_num_rows($result4);
            $result4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);

            if (isset($_GET['promo'])) {
                $promo = $_GET['promo'];
                for ($i = 0; $i < $rows4; $i++) {
                    $row4 = $result4[$i];
                    if ($promo == $row4['code']) {
                        $total_price = $total_price - ($total_price * $row4['value'] / 100); 
                    }
                }
            }

            if ($total_price == 0) {
                if ($rows != 0) {
                    echo "<h2 class='total-price'>Prix total : Gratuit</h2>";
                    echo "<button class='checkout-button'>Commander</button>";
                }
            }
            else if ($total_price >= 1 && $total_price <= 50) {
                echo "<div class='promo'>
                    <form action='shopping-cart.php' method='GET'>
                        <input type='text' name='promo' placeholder='Entrez votre code promo'>
                        <button type='submit'>Valider</button>
                    </form>
                </div>";
                echo "<h2 class='total-price green'>Prix total : " . $total_price . " €</h2>";
                echo "<button class='checkout-button'>Commander</button>";
                echo "<a href='shopping-cart.php?delete=1'><button class='delete-button'>Vider le panier</button></a>";
            } else if ($total_price > 51 && $total_price <= 75) {
                echo "<div class='promo'>
                    <form action='shopping-cart.php' method='GET'>
                        <input type='text' name='promo' placeholder='Entrez votre code promo'>
                        <button type='submit'>Valider</button>
                    </form>
                </div>";
                echo "<h2 class='total-price orange'>Prix total : " . $total_price . " €</h2>";
                echo "<button class='checkout-button'>Commander</button>";
                echo "<a href='shopping-cart.php?delete=1'><button class='delete-button'>Vider le panier</button></a>";
            } else if ($total_price > 76) {
                echo "<div class='promo'>
                    <form action='shopping-cart.php' method='GET'>
                        <input type='text' name='promo' placeholder='Entrez votre code promo'>
                        <button type='submit'>Valider</button>
                    </form>
                </div>";
                echo "<h2 class='total-price red'>Prix total : " . $total_price . " €</h2>";
                echo "<button class='checkout-button'>Commander</button>";
                echo "<a href='shopping-cart.php?delete=1'><button class='delete-button'>Vider le panier</button></a>";
            }
        ?>

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
    <script>
        let commanderbtn = document.querySelector(".checkout-button");
        commanderbtn.addEventListener("click", function() {
            alert("Votre commande a bien été prise en compte.");
        });
    </script>
</body>
</html>