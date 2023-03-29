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
</head>
<body>
    <header>
        <div class="hero-banner-content">
            <div class="hero-bannner-logo">
                <a href="market.html"><img src="../images/Logo.png" alt="logo"></a>
            </div>
            <div class="hero-banner-titles">
                <a class="hero-banner-title" href="market.html">Produits</a>
                <a class="hero-banner-title" href="team.html">Equipe</a>
                <a class="hero-banner-title" href="#">Support</a>
                <a class="hero-banner-title" href="#">Feedback</a>
                <a class="hero-banner-title hero-right" href="shopping-cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            </div>
        </div>
    </header>

    <?php
        require('db.php');

        $query = "SELECT * FROM `panier`";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    ?>
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
                            <h3>Quantité : " . $product['quantity'] . "</h3>
                        </div>
                        <div class='product-remove'>
                            <button class='remove-article'><a href='shopping-cart.php?id=" . $product['id'] . "'>Remove</a></button>
                        </div>
                    </div>";

                    $total_price += $product['price'] * $product['quantity'];
                }
            ?>
        </section>
    </section>

    <section class="checkout">
        <h2 class="total-price">Prix total : <?php echo $total_price ?></h2>
        <button class="checkout-button">Commander</button>
    </section>

    <script src="/script/shopping-cart.js"></script>
</body>
</html>