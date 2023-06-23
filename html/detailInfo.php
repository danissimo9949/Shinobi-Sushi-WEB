<?php
 session_start();
 require_once('../php/db_connect.php');

 $id = $_GET['id'];
 $product = mysqli_query($db, "SELECT * FROM products WHERE id = '$id'");
 if (!$product){
    echo mysqli_error($db);
 } else {
    $product = mysqli_fetch_assoc($product);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/detailInfo.css">
    <link rel="stylesheet" href="../css/media.css">
    <title>Детальна сторінка</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-nav">
                <a href="../html/site.php" class="logo"><img src="../images/logo.png"></a>
                <nav class="nav-menu open">
                    <ul class="menu">
                        <li class="menu-item"><a href="../html/site.php" class="nav-link">Головна</a></li>
                        <li class="menu-item"><a href="../html/catalog.php" class="nav-link-active">Меню</a></li>
                        <?php
                            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                                echo '<li class="menu-item"><a href="../php/adminPanel.php" class="nav-link-admin">Адмін</a></li>';
                            }
                            if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] == false) {
                                echo '<li class="menu-item"><a href="../html/loginForm.php" class="nav-link-enter">Вхід</a></li>';
                            } else{
                                echo '<li class="menu-item" style="display: none;"><a href="../html/loginForm.php" class="nav-link-enter">Вхід</a></li>';
                                echo '<li class="menu-item"> <a href="../php/logout.php"><img class="exit-img" src="../images/icons/icon-exit.png" alt="exit button"></a></li>';
                            }
                        ?>
                    </ul>
                    <button class="nav-btn">
                        <img src="../images/icons/nav-icon.svg" alt="Nav Button">
                    </button>
                </nav>
            </div>
            </div>
        </div>
    </header>
    <section class="detail"> 
    <div class="container">
    <div class="product-block">
        <img src="<?= $product['photo'] ?>" alt="Изображение товара" class="product-image">
        <div class="product-info">
            <h3 class="product-name"><?= $product['name'] ?></h3>
            <p class="product-price"><?= $product['price'] ?> грн</p>
            <p class="product-description"><?= $product['description'] ?></p>
            <button class="add-to-cart">Додати в кошик</button>
        </div>
    </div>
    </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="contact-row">
                <a href="https://www.instagram.com/sensei.sushi.ua/"  target="_blank"><img src="../images/icons/inst-icon.svg" alt="inst button"></a>
                <a href="https://twitter.com/"  target="_blank"><img src="../images/icons/twit-icon.svg" alt="twitter button"></a>
                <a href="#!"><img src="../images/icons/lnkd-icon.svg" alt="linked button"></a>
            </div>
            <div class="footer-cc">
                <p class="cc">(c) 2023 all rigths reserved</p>
            </div>
        </div>
    </footer>
    
</body>
</html>