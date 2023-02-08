<?php
	include 'maFonctionSQL.php';
	include 'maFonctionTable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$produits = getProduits();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$produits = readProduits($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
?><html>
<header>
	<link rel="stylesheet" href="style.css">
</header>
<body>
		
	<form action="createProduit.php" method="get">
	<p>	
		<a href="index.php">Liste des produits</a>

		<input type="hidden" name="id" value="<?php echo $produits['id'];  ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>
        <div>
		<div>
        	<label for="reference">Reference :</label>
        	<input type="text" id="reference" name="reference" value="<?php echo $produits['reference'];  ?>">
		 <div>
        	<label for="name">Nom :</label>
        	<input type="text" id="nom" name="nom" value="<?php echo $produits['nom'];  ?>">
	    </div>
		</div>
        	<label for="description">Description :</label>
			<textarea id="description" name="description" placeholder="<?php echo $produits['description'];  ?>"></textarea>

	    </div>
	    <div>
	        <label for="prixAchatUnitaire">Prix achat unitaire</label>
	        <input type="text" id="prixAchatUnitaire" name="prixAchatUnitaire" value="<?php echo $produits['prixAchatUnitaire'];  ?>">
	    </div>
	    <div>
	        <label for="prixVenteUnitaire">Prix vente unitaire:</label>
	        <input type="text" id="prixVenteUnitaire" name="prixVenteUnitaire" value="<?php echo $produits['prixVenteUnitaire'];  ?>">
	    </div>
	    <div>
	        <label for="stock">Stock :</label>
			<input type="text" id="stock" name="stock" value="<?php echo $produits['stock'];  ?>">
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="createProduit.php" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $produits['id'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>
	</form>
	<?php } ?>

</body>
</html>