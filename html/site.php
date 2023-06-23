
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shinobi Sushi</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/media.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-nav">
                <a href="#" class="logo"><img src="../images/logo.png"></a>
                <nav class="nav-menu open">
                    <ul class="menu">
                        <li class="menu-item"><a href="../html/site.php" class="nav-link-active">Головна</a></li>
                        <li class="menu-item"><a href="../html/catalog.php" class="nav-link">Меню</a></li>
                    
                        <?php
                            session_start();
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
            <div class="header-row">
                <div class="header-content">
                    <h1 class="header-title">Справжні шинобі замовляють тільки тут!</h1>
                    <p>Не зволікай! Встигни замовити свій шинобі набір</p><br>
                    <a href="../html/catalog.php" class="explore-btn">Дізнатися більше</a>
                </div>      

                <div class="header-image">
                    <img src="../images/shinobi.png" alt="">
                </div>
            </div>
        </div>
    </header>
    <section class="card-section">
        <div class="container">
            <div class="card-wrapper">
                <div class="card-1">
                    <a href="../html/catalog.php"><img src="../images/8bereznya.png" alt=""></a>
                </div>
                <div class="card-2">
                    <a href="../html/catalog.php"><img src="../images/punch1.png" alt=""></a>
                </div>
                <div class="card-3">
                    <a href="../html/catalog.php"><img src="../images/hit.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <section class="product-section">
        <div class="container">
            <div class="section-title">
                <h1>Рекомендації</h1>
            </div>
           <div class="product-wrapper">
            <a href="#" class="product-link"><div class="product1">
                <img src="../images/roll1.png" alt="">
                <h3>Текка Маки</h3>
                <p class="price">300 грн</p>
            </div></a>
            <a href="#" class="product-link"><div class="product2">
                <img src="../images/roll2.png" alt="">
                <h3>Авокадо Маки</h3>
                <p class="price">200 грн</p>
            </div></a>
            <a href="#" class="product-link"><div class="product3">
                <img src="../images/roll3.png" alt="">
                <h3>Унаги Маки</h3>
                <p class="price">350 грн</p>
            </div></a>
           </div>
        </div>
    </section>
    <footer class="footer">
            <div class="back-to-top-container">
                <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
            </div>
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