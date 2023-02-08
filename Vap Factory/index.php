<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vap Factory</title>
</head>
<body>

    <?php
        include 'maFonctionSQL.php';
        include 'maFonctionTable.php';
        $rows = getAllProduits();
        affichierTableau($rows, getHeaderTable());
        ?>

    <a href=formulaireProduit.php?id=0 >Creer un produit</a> 
</body>
</html>

    
