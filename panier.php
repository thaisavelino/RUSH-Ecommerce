<?php
//include("index.php");
include ("actionpanier.php");
?>

<html>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Site</title>
	  <link rel="stylesheet" type="text/css" href="css.css">
  	</head>
<body>
<header><a href="index.php?cat=all" class="a-top" id="logo"></a>
		<nav class="nav-top">
			<a class="a-top" href="#" id="menu-icon"></a>
			<ul class="ul-top">
				<li class="li-top"><a href="index.php?cat=all"> All</a></li>
				<li class="li-top"><a href="index.php?cat=all"> Hot</a></li>
				<li class="li-top"><a href="index.php?cat=all"> Cold</a></li>
				<li class="li-top"><a href="index.php?cat=all"> Funny</a></li>
			</ul>
		</nav>
	</header>

<table>
<caption>Mon Panier</caption>
<thead>
<tr>
	<th scope="col" class="panier" style="border-radius:5px; background-color:336666"><b>Produit</b></th>
	<th scope="col" class="panier" style="border-radius:5px; background-color:336666"> Prix unitaire </th>
	<th scope="col" class="panier" style="border-radius:5px; background-color:336666"> Prix cumulé </th>
	<th scope="col" class="panier" style="border-radius:5px; background-color:336666"> Quantité</th> 
</tr>
<thead>
<tbody>
	<tr><td class="panier"><b>Color 2</b></td> <td class="panier"> 32.5 € </td> <td class="panier"> 75 € </td> <td class="panier"> 2 </td> </tr>
	<tr><td class="panier"><b>Color 2</b></td> <td class="panier"> 32.5 € </td> <td class="panier"> 75 € </td> <td class="panier"> 2 </td> </tr>
	<tr><td class="panier"><b>Color 2</b></td> <td class="panier"> 32.5 € </td> <td class="panier"> 75 € </td> <td class="panier"> 2 </td> </tr>
	<tr><td class="panier"><b>Color 2</b></td> <td class="panier"> 32.5 € </td> <td class="panier"> 75 € </td> <td class="panier"> 2 </td> </tr>
	<tr><td class="panier"><b>Total</b></td> <td class="panier"> 32.5 € </td> <td class="panier"> 75 € </td> <td class="panier"> <input type="submit" value="ACHETER"></td> </tr>
	
<?php
		if (!$_SESSION['panier'])
		//	echo "Votre panier est vide";


		if ($_SESSION[panier] && $_GET[value] !== "empty" && $_GET[command] !== "ok")
		{
			foreach ($_SESSION[panier] as $key => $elem)
			{	
				$prix_unite = $elem[prix_produit] / $elem[qte];
				echo "<tr> <td class=\"panier\"><b>$elem[nom_produit]</b></td> <td class=\"panier\"> $prix_unite € </td> <td class=\"panier\"> $elem[prix_produit] € </td> <td class=\"panier\"> $elem[qte]
				</td> </tr>";
				$total = $total + $elem[prix_produit];
			}
			echo "<tr class=\"panier\"> <td class=\"total\">Total : $total € <td></tr></tbody></table><br /><br/>";

			if (!$_SESSION['loggued_on_user'])
				echo "<div> Vous devez d'abord vous connecter pour commander </div>";
			else {
			echo "<img src=\"./imagesdebase/Tic.png\" width=25px style=\"position:relative; top:7px; margin-right:10px\"> Validez votre commande : 
			<form style=\"font-size:20px\" method=\"post\"action=\"panier.php?value=validate&command=ok\">
			<input type=\"submit\" name=\"validate\" value=\"Valider le panier\"/>
			</form>";}
			echo "Videz votre panier : 
			<form style=\"font-size:20px\" method=\"post\"action=\"panier.php?value=empty\">
			<input type=\"submit\" name=\"empty\" value=\"Vider le panier\"/>
			</form>";

		}
		if($_GET[value] === "empty")
		{
			unset($_SESSION[panier]);
		//	echo "Votre panier est vide";
		}

		if($_GET[value] === "validate" && $_SESSION[panier])
		{
			if ($_SESSION['loggued_on_user'])
			{
				foreach ($_SESSION[panier] as $key => $elem)
						$total = $total + $elem[prix_produit];
				if (!file_exists("data/commandes")){
					$tab[] = array("user"=>$_SESSION[loggued_on_user], "panier" => $_SESSION[panier], "total" => $total);
					$str = serialize($tab);
					file_put_contents("data/commandes", $str);
					echo "Commande effectuée, merci de votre visite !";
					unset($_SESSION[panier]);
				}
				else{
					$tab = array("user"=>$_SESSION[loggued_on_user], "panier" => $_SESSION[panier], "total" => $total);
					$commandes = file_get_contents("data/commandes");
					$commandes = unserialize($commandes);
					$commandes[] = $tab;
					$str = serialize($commandes);
					file_put_contents("data/commandes", $str);
					echo "Commande effectuée, merci de votre visite !";
					unset($_SESSION[panier]);
				}		
			}
		}
	?>
	
</body>
</html>