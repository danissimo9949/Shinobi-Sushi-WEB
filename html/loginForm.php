<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginPage.css">
    <script src="../js/animForm.js" defer></script>
    <title>Вхід</title>
</head>
<body>
    <div class="container">
        <div class="form-block">

            <section class="block__item block-item">
                <h2 class="block-title">Ще немає аккаунту?</h2>
                <button class="block-item-btn signIn-button">Зареєструватися</button>
            </section>
            <section class="block__item block-item">
                <h2 class="block-title">У вас вже є аккаунт?</h2>
                <button class="block-item-btn signUp-button">Увійти</button>
            </section>
        </div>
        
        <div class="form-box">

        <form id="registrationForm" action="../php/registration.php" class="form form-signup" method="post">
    <h3 class="form__title">Реєстрація</h3>
    <p>
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" class="form_input" required>
        <span id="email-error" class="error-message"></span>
    </p>
    <p>
        <label for="login">Логін</label>
        <input id="login" name="login" type="text" class="form_input" required>
        <span id="login-error" class="error-message"></span>
    </p>
    <p>
        <label for="password">Пароль</label>
        <input id="password" name="password" type="password" class="form_input" required>
        <span id="password-error" class="error-message"></span>
    </p>
    <p>
        <label for="repeatpassword">Підтвердіть пароль</label>
        <input id="repeatpassword" name="repeatpassword" type="password" class="form_input" required>
        <span id="repeatpassword-error" class="error-message"></span>
    </p>
    <p>
        <button type="submit" class="form-btn form-btn-signup">Зареєструватися</button>
    </p>
        </form>

            <form action="../php/auth.php" class="form form-signin" method = "post">
            
                <h3 class="form__title">Вхід</h3>
                
                <p>
                    <input name="login" type="text" class="form_input" placeholder="Логін" required>
                </p>
                <p>
                    <input name="password" type="password" class="form_input" placeholder="Пароль" required>
                </p>
                <p>
                    <button type="submit" class="form-btn">Увійти</button>
                </p>
                <p>
                    <a href="" class="form-forgot">Забули пароль?</a>
                </p>
            </form>
            
        </div>
    </div>
    <script src="../js/validation.js"></script>
</body>
</html>