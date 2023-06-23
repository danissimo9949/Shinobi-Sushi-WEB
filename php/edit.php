<?php
require_once('../php/db_connect.php');

$product_id = $_GET['id'];
$product = mysqli_query($db, "SELECT * FROM products WHERE id = '$product_id'");
if (!$product){
    echo mysqli_error($db);
}else{

$product = mysqli_fetch_assoc($product);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit products</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>
    
<form action="../vendor/update.php" class="form" method="post" enctype="multipart/form-data">
        <h3 class="form-title">Редагування товару</h3>

        <div class="form-group">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <p>
                <select name="category" id="categ" class="form-select">
                    <option  value="Роли">Роли</option>
                    <option  value="Суші">Суші</option>
                    <option  value="Напої">Напої</option>
                </select>
            </p>
            <p>
                <input name="productName" type="text" class="form_input" value="<?= $product['name'] ?>">
            </p>
            <p>
                <input name="productPrice" type="text" class="form_input" value="<?= $product['price'] ?>">
            </p>
            <p>
                <textarea name="Description" type="text" class="form_input"><?= $product['description'] ?></textarea>
            </p><br>
                <img class="prod-img" src="<?= $product['photo'] ?>">
            <p>
                <input type="file" name="photo" value="<?= $product['photo'] ?>">
            </p>
        </div>
        
        <div class="button-submit">
            <button type="submit" class="form-btn">Підтвердити зміни</button>
        </div>
    </form>

</body>
</html>