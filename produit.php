<?php
$value = $_POST["add"];
$qte = $_POST["nbarticles"];
if ($value === "Ajouter au panier")
{
	add($nom_produit, $qte, $prix_produit);
	echo "<script>setTimeout(\"location.href = 'produit.php?prod=$nom_produit';\", 100);</script>";
}
?>

<?php 
}
else 
{
	echo "<br>Page non disponible";
	echo "<br /><a href=\"index.php\" class=\"button\" style=\"position:relative; top:10px; left: -10px \" > Retour a la page d'accueil </a>";
}
