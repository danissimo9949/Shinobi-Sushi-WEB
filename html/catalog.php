<?php
  session_Start();
  require_once('../php/db_connect.php');

  $products = mysqli_query($db, "SELECT p.id, c.category_name, p.name, p.price, p.description, p.photo FROM products p INNER JOIN categories c ON p.categoryid = c.categoryid");
  if (!$products){
    echo mysqli_error($db);
  } else{
    $products = mysqli_fetch_all($products);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/media.css">
    <title>Меню</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-nav">
                <a href="#" class="logo"><img src="../images/logo.png"></a>
                <nav class="nav-menu open">
                    <ul class="menu">
                        <li class="menu-item"><a href="../html/site.php" class="nav-link">Головна</a></li>
                        <li class="menu-item"><a href="#" class="nav-link-active">Меню</a></li>
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
    <section class="section section-catalog">
        <div class="container">
          <header class="section__header">
            <h2 class="section-title">Меню</h2>
            <nav class="catalog-nav">
              <ul class="catalog-nav__wrapper">
                <li class="catalog-nav__item">
                  <button class="catalog-nav__btn is-active" id="btn-all" type="button">Всі</button>
                </li>
                <li class="catalog-nav__item">
                  <button class="catalog-nav__btn" id="btn-sushi" type="button">Суші</button>
                </li>
                <li class="catalog-nav__item">
                  <button class="catalog-nav__btn" id="btn-rolls" type="button">Роли</button>
                </li>
                <li class="catalog-nav__item">
                  <button class="catalog-nav__btn" id="btn-drinks" type="button">Напої</button>
                </li>
              </ul>
            </nav >
          </header>

          <div class="products_catalog">
           <div class="product-wrapper">
            <?php
                foreach($products as $product) {
            ?>
                <a href="../html/detailInfo.php?id=<?= $product[0] ?>" class="product-link"><div class="product" data-category="<?= $product[1] ?>">
                <img class="product-img" src="<?= $product[5] ?>" alt="">
                <h3 class="product-name"><?= $product[2] ?></h3>
                <p class="price"><?= $product[3] ?> грн</p>
                <button class="add-to-cart">Додати до кошика</button>
            </div></a>
            <?php
              }
            ?>
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
    <script src="../js/sorting.js"></script>
</body>
</html>