<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="/style/market.css">
    <title>FastDev</title>
</head>
<body>
    <header>
        <div class="hero-banner-content">
            <div class="hero-bannner-logo">
                <img src="/images/Logo.png" alt="logo">
            </div>
            <div class="menu">
                <i class="fa-solid fa-bars" id="open"></i>
                <i class="fa-solid fa-xmark" id="close"></i>
            </div>
            <div class="hero-banner-titles">
                <a class="hero-banner-title">Produits</a>
                <a class="hero-banner-title">Equipe</a>
                <a class="hero-banner-title">Support</a>
                <a class="hero-banner-title">Feedback</a>
                <a class="hero-banner-title hero-right"><i class="fa-solid fa-bag-shopping"></i></a>
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
    
    
    <section class="container">
        <div class="titre">
            <h1>Le <a>meilleur</a> site</h1>
            <h1>de formation</h1>
            <h1>en ligne</h1>
            <p>Plus de 400 formations en ligne, les prix les abordables du marché !</p>
            <button>Commencer<i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <img src="/images/Market/main.png">
    </section>

    <section class="last_drop">
        <div class="drop_card">
            <div class="drop">
                <img src="/images/Market/js.png">
                <p>Débutant</p>
                <h2>Apprendre le JS et ses spécificité</h2>
                <p>Si vous voulez devenir pro en JS vous devez prendre cette formation</p>
                <div class="price">
                    <p>140$</p>
                </div>
                <button>Add card</button>
            </div>
            <div class="drop">
                <img src="/images/Market/php.png">
                <p>Débutant</p>
                <h2>Apprendre le JS et ses spécificité</h2>
                <p>Si vous voulez devenir pro en JS vous devez prendre cette formation</p>
                <div class="price">
                    <p>140$</p>
                </div>
                <button>Add card</button>
            </div>
            <div class="drop">
                <img src="/images/Market/js.png">
                <p>Débutant</p>
                <h2>Apprendre le JS et ses spécificité</h2>
                <p>Si vous voulez devenir pro en JS vous devez prendre cette formation</p>
                <div class="price">
                    <p>140$</p>
                </div>
                <button>Add card</button>
            </div>
            <div class="drop">
                <img src="/images/Market/js.png">
                <p>Débutant</p>
                <h2>Apprendre le JS et ses spécificité</h2>
                <p>Si vous voulez devenir pro en JS vous devez prendre cette formation</p>
                <div class="price">
                    <p>140$</p>
                </div>
                <button>Add card</button>
            </div>
            <div class="drop">
                <img src="/images/Market/php.png">
                <p>Débutant</p>
                <h2>Apprendre le JS et ses spécificité</h2>
                <p>Si vous voulez devenir pro en JS vous devez prendre cette formation</p>
                <div class="price">
                    <p>140$</p>
                </div>
                <button>Add card</button>
            </div>
            <div class="drop">
                <img src="/images/Market/js.png">
                <p>Débutant</p>
                <h2>Apprendre le JS et ses spécificité</h2>
                <p>Si vous voulez devenir pro en JS vous devez prendre cette formation</p>
                <div class="price">
                    <p>140$</p>
                </div>
                <button>Add card</button>
            </div>
            
        </div>
    </section>

</body>
</html>