<?php
	require 'maFonctionSQL.php';
	require 'maFonctionTable.php';
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id"];
	} else {
		$id = $_GET["id"];
		$reference = $_GET["reference"];
		$nom = $_GET["nom"];
		$description = $_GET["description"];
		$prixAchatUnitaire = $_GET["prixAchatUnitaire"];
		$prixVenteUnitaire = $_GET["prixVenteUnitaire"];
		$stock = $_GET["stock"];
	}
	

	if ($action == "CREATE") {
		createProduits($reference, $nom, $description, $prixAchatUnitaire, $prixVenteUnitaire, $stock);
		echo "produit ajouté <br>";
		echo "<a href='index.php'>Liste des produits</a>";

	}
	
	if ($action == "UPDATE") {
		updateProduits($id, $reference, $nom, $description, $prixAchatUnitaire, $prixVenteUnitaire, $stock);
		echo "produit update <br>";
		echo "<a href='index.php'>Liste des produits</a>";

	}
	if ($action == "DELETE") {
		deleteProduits($id);
		echo "produit delete <br>";
		echo "<a href='index.php'>Liste des produits</a>";
	}
?>