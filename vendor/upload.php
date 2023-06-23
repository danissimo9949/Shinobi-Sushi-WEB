<?php

require_once("../php/db_connect.php");


if (isset($_POST['productName']) && isset($_POST['productPrice']) && isset($_POST['Description']) 
&& isset($_POST['category']) && isset($_FILES['photo'])){

    $category = $_POST['category'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $description = $_POST['Description'];

    // обробка завантаження фото на сервер
    $photo = $_FILES['photo'];
    $photoName = $photo['name'];
    $photoTmpName = $photo['tmp_name'];
    $photoSize = $photo['size'];
    $allowedFormats = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);

    $uploadDirectory = '../images/';
    $uploadedFilePath = $uploadDirectory.$photoName;

    $imageType = exif_imagetype($photoTmpName);

    if (!move_uploaded_file($photoTmpName,$uploadedFilePath)){
        echo 'Помилка при завантаженні зображення';
    }else if(!in_array($imageType,$allowedFormats)){
        echo 'Формат зображення не підтримується, повинен бути JPEG, PNG або GIF';
    }
    
    $querySelect = "SELECT `categoryid` FROM `categories` WHERE `category_name` = '$category'";
    $resultSelect = mysqli_query($db, $querySelect);

if (!$resultSelect) {
    echo mysqli_error($db);
} else {
    $row = mysqli_fetch_assoc($resultSelect);
    if ($row) {
        $categoryID = $row['categoryid'];
        $query = mysqli_query($db, "INSERT INTO `products` (`id`, `categoryid`, `name`, `price`, `description`, `photo`) VALUES (NULL,'$categoryID', '$productName', '$productPrice', '$description', '$uploadedFilePath')");
        if (!$query) {
            echo mysqli_error($db);
        } else {
            header("Location: ../php/adminPanel.php");
        }
    } else {
        echo 'Невідома категорія';
    }
}
}
else{
    echo 'Введіть дані в усі поля форми!';
}

?>