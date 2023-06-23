<?php
require_once('../php/db_connect.php');

if (isset($_POST['productName']) && isset($_POST['productPrice']) && isset($_POST['Description']) 
&& isset($_POST['category'])){

$id = $_POST['id'];
$category = $_POST['category'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$description = $_POST['Description'];


$querySelect = "SELECT `categoryid` FROM `categories` WHERE `category_name` = '$category'";
$resultSelect = mysqli_query($db, $querySelect);

    if (!$resultSelect){
       echo mysqli_error($db);
    } else {
        $row = mysqli_fetch_assoc($resultSelect);
        if(!$row){
            echo mysqli_error($db);
        } else {
            $categoryID = $row['categoryid'];
            
            if (!empty($_FILES['photo']['name'])) {
                $photo = $_FILES['photo'];
                $photoName = $photo['name'];
                $photoTmpName = $photo['tmp_name'];
                $photoSize = $photo['size'];
                $allowedFormats = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
              
                $uploadDirectory = '../images/';
                $uploadedFilePath = $uploadDirectory . $photoName;
              
                // Проверяем, был ли загружен файл
                if (!empty($photoTmpName)) {
                  $imageType = exif_imagetype($photoTmpName);
              
                  if (!move_uploaded_file($photoTmpName, $uploadedFilePath)) {
                    echo 'Помилка при завантаженні зображення';
                  } else if (!in_array($imageType, $allowedFormats)) {
                    echo 'Формат зображення не підтримується, повинен бути JPEG, PNG або GIF';
                  }
                }   
                              
                $update = mysqli_query($db, "UPDATE `products` SET `categoryid` = '$categoryID', `name` = '$productName', `price` = '$productPrice',
                `description` = '$description', `photo` = '$uploadedFilePath' WHERE `id` = '$id'");
                header("Location: ../php/adminPanel.php");
              
              } else {
                $update = mysqli_query($db, "UPDATE `products` SET `categoryid` = '$categoryID', `name` = '$productName', `price` = '$productPrice',
                  `description` = '$description' WHERE `id` = '$id'");
                  header("Location: ../php/adminPanel.php");
              }
        }
    }
} else{
    echo 'В полях не введені дані';
}

?>