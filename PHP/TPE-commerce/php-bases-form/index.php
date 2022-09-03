<?php
session_start();

$_SESSION['user'] = 'Admin';

include_once('./validations.php');

// initialisation de nos valeurs de formulaire
$name = isset($_POST['name']) ? $_POST['name'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : 0;
$formSubmitted = !empty($_POST);

if($formSubmitted) {
    $newProduct = [];
    $isFormValid = true;

    if(validate_name($name)) {
        $newProduct['name'] = $name;
    } else {
        $isFormValid = false;
        $nameError = 'Renseignez un nom d\' au moins 4 caractères';
    }

    if(validate_desc($description)) {
        $newProduct['description'] = $description;
    } else {
        $isFormValid = false;
        $descError = 'Renseignez une description d\' au moins 16 caractères';
    }

    if(validate_price($price)) {
        $newProduct['price'] = $price;
    } else {
        $isFormValid = false;
        $priceError = 'Renseignez un prix d\' au moins 1 €';
    }

    if($isFormValid) {
        // ajout en bdd
        var_dump($newProduct);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Création produit</title>
</head>
<body>
    <h1>Création d'un produit</h1>

    <a href="./mes-produits.php">Voir mes produits</a>
    
    <form method="post">
        <fieldset>
            <legend>Nouveau produit</legend>

            <label for="name">Nom du produit:</label><br>
            <?php if(isset($nameError)) { ?>
                <p class="error"><?= $nameError ?></p>
            <?php } ?>
            <input type="text" name="name" id="name" placeholder="Nom du produit..." value="<?= $name ?>">
            
            <br><br>
            
            <label for="description">Description</label><br>
            <?php if(isset($descError)) { ?>
                <p class="error"><?= $descError ?></p>
            <?php } ?>
            <textarea 
                name="description"
                id="description"
                cols="30"
                rows="10"
                placeholder="Description du produit..."><?= $description ?></textarea>
            
            <br><br>
            
            <label for="price">Prix du produit:</label><br>
            <?php if(isset($priceError)) { ?>
                <p class="error"><?= $priceError ?></p>
            <?php } ?>
            <input type="number" name="price" id="price" value="<?= $price ?>">

            <input type="submit" value="Sauvegarder">
        </fieldset>
    </form>
</body>
</html>
