<?php
	// CHECK login and ADD products div.
	session_start();
	include("product.php");
	if($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] == "OK")
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
//	include("products.php");

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
<!--------------------------------------
				MENU - TOP
---------------------------------------->
<header><a class="a-top" href="#" id="logo"></a>
    <nav class="nav-top">
        <a class="a-top" href="#" id="menu-icon"></a>
        <ul class="ul-top">
            <li class="li-top"><a href="<?PHP echo "?cat=all" ?>" class="current">All</a></li>
			<li class="li-top"><a href="<?PHP echo "?cat=hot" ?>"> Hot</a></li>
            <li class="li-top"><a href="<?PHP echo "?cat=cold" ?>">Cold</a></li>
            <li class="li-top"><a href="<?PHP echo "?cat=funny" ?>">Funny</a></li>
        </ul>
    </nav>
</header>

     

<div class="hold">
	<!--------------------------------------
				LOGIN - LEFT 
	---------------------------------------->
	<div class="menu-left">

		<form method="post" action="connexion.php" style="margin: 20px" >
			<h2>Déjà client ?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
		
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd"/>
			<input type="submit" name="submit" value="Je me connecte" />
		</form>
		<form method="post" action="creation.php" style="margin: 20px">
			<h3>Pas encore client ? </h3>
			<h3>Inscrivez-vous!</h3>
			
			<label for="login">Identifiant: </label><input type="text" name="login" required/>
			Adresse mail : <input type="text" name="mail" required/>
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd" required/>
			<input type="submit" name="submit" value="Je m'inscris"/>
		</form>
		<div class"go-basket">
			<span><a href="panier.php">Accéder à mon panier</a></span>
			<p class="basket-qnt">0</p>
			<p> Prix total : 0 € </p>
		</div>
	</div>

	<!--------------------------------------
				PRODUCTS
	---------------------------------------->
	<section class="images">

	
	<!--<figure class="left cold">
			<img class="img" src="/img/cold-1.jpeg" alt="A cold color">-->
		<?php
		if(file_exists("./data/product"))
			$data = unserialize(file_get_contents("./data/product"));
		else
			echo "File Product not found\n";
		if($_GET['cat'] === NULL)
			foreach ($data as $key => $el)
			{
				echo "<figure class=\"left cold\"><img class='imgcat' src='" . $el['img'] . "' 
				alt=\'" . $key . 
				" title='" . $key.
				"'/><span id=\"cold-2\">$ 2.50</span><input class=\"bt-add\" type=\"submit\" name=\"add-basket\" value=\"ADD\"></figure>";
			}
		elseif($_GET['cat'])
		{
			if ($_GET['cat'] === hot)
			{
				echo "<h1>HOT</h1>";
			}
			if ($_GET['cat'] === cold)
			{
				echo "<h1>COLD</h1>";
			}
			if ($_GET['cat'] === funny)
			{
				echo "<h1>FUNNY</h1>";
			}
			if ($_GET['cat'] === all)
			{
				echo "<h1>ALL</h1>";
			}
			if ($_GET['cat'] !== "hot" && $_GET['cat'] !== "cold" && $_GET['cat'] !== "funny" && $_GET['cat'] !== "all")
				echo "GET INJECTION ERROR\n";
			else
				show_product($data);
		}
	?>
	</section>
</body>
</html>