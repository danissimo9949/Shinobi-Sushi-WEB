<?php
 
 require_once('../php/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    
    <title>Admin Panel</title>
</head>
<body>
    <div class="title">
        <h1 class="admin-panel-title">Адміністративна панель</h1>
    </div>
    
    
    <form action="../vendor/upload.php" class="form" method="post" enctype="multipart/form-data">
        <h3 class="form-title">Додавання товару</h3>

        <div class="form-group">
            <p>
                <select name="category" id="categ" class="form-select">
                    <option  value="Роли">Роли</option>
                    <option  value="Суші">Суші</option>
                    <option  value="Напої">Напої</option>
                </select>
            </p>
            <p>
                <input name="productName" type="text" class="form_input" placeholder="Назва товару">
            </p>
            <p>
                <input name="productPrice" type="text" class="form_input" placeholder="Ціна товару">
            </p>
            <p>
                <textarea name="Description" type="text" class="form_input" placeholder="Опис товару"></textarea>
            </p>
            <p>
                <input type="file" name="photo" placeholder="Завантажити файл">
            </p>
        </div>
        
        <div class="button-submit">
            <button type="submit" class="form-btn">Додати товар</button>
            <a href="../html/catalog.php" class="form-btn">Перейти на сайт</a>
        </div>
    </form>
    
    
    <div class="table-block">
    <table CELLSPACING=0>
        <thead class="header-table">
            <th>ID продукту</th>
            <th>Категорія продукту</th>
            <th>Назва</th>
            <th>Ціна</th>
            <th>Опис продукту</th>
            <th>Зображення</th>
        </thead>
        <?php
            
            $products = mysqli_query($db, "SELECT p.id, c.category_name, p.name, p.price, p.description, p.photo FROM products p INNER JOIN categories c ON p.categoryid = c.categoryid
            ORDER BY p.id DESC");
            if ($products){
            $products = mysqli_fetch_all($products);
            } else{
                mysqli_error($db);
            }
            foreach ($products as $product){
        ?>
        <tr>
            <td><?= $product[0] ?></td>
            <td><?= $product[1] ?></td>
            <td><?= $product[2] ?></td>
            <td><?= $product[3] ?></td>
            <td><?= $product[4] ?></td>
            <td><img class="product-img" src="<?= $product[5]?>"></td>
            <td class="edit-btn"><a href="../php/edit.php?id=<?= $product[0] ?>"><img class="change-img" src="../images/icons/icon-change.png"></a></td>
            <td class="delete-btn"><a href="../vendor/delete.php?id=<?= $product[0] ?>"><img class="delete-img" src="../images/icons/icon-delete.png"></a></td>
        </tr>
        <?php
            }
    ?>
    </table>
    </div>
</body>
</html>