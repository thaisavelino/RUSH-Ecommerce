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
	  <link rel="stylesheet" type="text/css" href="css.css">
	  <script type="text/javascript">
			var
			imghot = document.getElementsByClassName("hot"),
			imgcold = document.getElementsByClassName("cold"),
			imgfunny = document.getElementsByClassName("funny"),
			
			btall = document.getElementById("all"),
			btcold = document.getElementById("cold"),
			bthot = document.getElementById("hot"),
			btfunny = document.getElementById("funny");


			bthot.addEventListener("click", function(){
			if (imghot.style.display == 'none') {
				imghot.style.display = 'block';
			} else {
				imghot.style.display = 'none';
			}
			}, false);
		</script>
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

		<?php 
		if($_SESSION['loggued_on_user'] === "" || !($_SESSION['loggued_on_user']))
		{
			echo'<form method="post" action="login.php" style="margin: 20px" >
				<h2>Déjà client ?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
		
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd"/>
			<input type="submit" name="submit" value="Je me connecte" />
			</form>
			<form method="post" action="addusr.php" style="margin: 20px">
				<h2>Pas encore client ? </h>
				<h3>Inscrivez-vous!</h3>
			
			<label for="login">Identifiant: </label><input type="text" name="login" required/>
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd" required/>
			<input type="submit" name="submit" value="Je m\'inscris"/>
			</form>'; 
		}
		else
		{
			echo '<form method="post" action="logout.php">
					<input type="submit" name="logout" value="Se deconnecter"/>
				</form>';
			echo "Un arc en ciel de couleur pour toi, ".$_SESSION['loggued_on_user']." !\n";
		}
		?>
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

	<p>test</p>
	<!--<figure class="left cold">
			<img class="imgcat" src="/img/cold-1.jpeg" alt="A cold color">-->
			
		<?php
		if(file_exists("./data/product"))
			$data = unserialize(file_get_contents("./data/product"));
		else
			echo "File Product not found\n";
		if($_GET['cat'] === NULL)
		{
			/*echo '<a href="<?PHP echo "?cat=all" ?>" class="current">All</a>"';*/
			$_GET['cat'] = 'all';
			foreach ($data as $key => $el)
			{
				echo "<figure class=\"left cold\"><img class='imgcat' src='" . $el['img'] . "' 
				alt=\'" . $key . 
				" title='" . $key.
				"'/><span id=\"cold-2\">$ 3.50</span>
				<input class=\"bt-add\" type=\"submit\" name=\"add-basket\" value=\"ADD\" />
				<input class=\"bt-add2\" type=\"number\" min=\"1\" max=\"10\" name=\"nbarticles\" value=\"1\" />
				</figure>";
			}
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