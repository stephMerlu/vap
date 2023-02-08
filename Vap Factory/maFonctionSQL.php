<?php
function getDatabaseConnexion() {
    try {
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=vap factory', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }
}

function getAllProduits(){
    $con = getDatabaseConnexion();
    $requete = 'SELECT * FROM produits';
    $rows = $con->query($requete);
    return $rows; 
}

function readProduits($id){
    $con = getDatabaseConnexion();
    $requete = "SELECT * FROM produits where id = '$id' ";
    $stmt = $con->query($requete);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

function createProduits($reference, $nom, $description, $prixAchatUnitaire, $prixVenteUnitaire, $stock){
    try {
        $con =getDatabaseConnexion();
        $sql = "INSERT INTO produits(reference, nom, description, prixAchatUnitaire, prixVenteUnitaire, stock)
            VALUES ('$reference', '$nom', '$description', '$prixAchatUnitaire', '$prixVenteUnitaire', '$stock')";
        $con->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


function updateProduits($id, $reference, $nom, $description, $prixAchatUnitaire, $prixVenteUnitaire, $stock){
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE produits set 
                    reference = '$reference',
                    nom = '$nom',
                    description = '$description',
                    prixAchatUnitaire = '$prixAchatUnitaire',
                    prixVenteUnitaire = '$prixVenteUnitaire',
                    stock = '$stock',
                    where id = '$id'";
                    $stmt = $con->query($requete); 
                    return $stmt;
    }
    catch(PDOException $e) {
        echo '$sql' . "<br>" . $e->getMessage();
    }
}

function deleteProduits($id){
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE from produits where id = '$id'";
        $stmt = $con->query($requete);
        return $stmt;
    }
    catch(PDOException $e) {
        echo '$sql' . "<br>" . $e->getMessage();
    }
}



function getProduits() {
    $produits['id'] = "";
    $produits['reference'] = "";
    $produits['nom'] = "";
    $produits['description'] = "";
    $produits['prixAchatUnitaire'] = "";
    $produits['prixVenteUnitaire'] = "";
    $produits['stock'] = "";
    return $produits;
}
