<?php
	session_start();
	if($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] == "OK")
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
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

	<nav>
		<ul>
			<li class="img"><img src="https://www.sncf.com/themes/contrib/sncf_theme/node_modules/sncf-styleguide-reloaded/dist/build/img/logo-sncf.svg?v=3694715264" alt="SNCF"> </li>
			<li><a href="#">ALL</a></li>
			<li><a href="http://">Funny</a></li>
			<li><a href="http://">Hot</a></li>
			<li><a href="http://">Cold</a></li>
		</ul>
	</nav>

<div class="hold">
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

		<a href="panier.php"><img src="./imagesdebase/panier.png" style="width:60px; position:relative; top:10px"><span style="margin:10px">Accéder à mon panier</a>

		<br/><div style="margin-left:20px;line-height:30px; font-size:20px; letter-spacing:-3px">0<br/></div><div style="margin:18px"> Prix total : 0 € </div>
		<br/>
		<br/>
	</div>

	<div class="main">
		<section class="images">
			<figure class="left cold">
				<img class="img" src="/img/cold-1.jpeg" alt="A cold color">
			</figure>
			<figure class="left cold">
				<img class="img" src="/img/cold-2.jpeg" alt="A cold color">
				<span id="cold-2">$ 2.50</span>
				<select class="select-more" id="#">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<input class="bt-add" type="submit" name="add-basket" value="ADD">
			</figure>
			<figure class="left cold">
				<img class="img" src="/img/cold-3.jpeg" alt="A cold color">
			</figure>
			<figure class="left cold">
				<img class="img" src="/img/cold-4.jpeg" alt="A cold color">
			</figure>
			<figure class="left hot">
				<img class="img" src="/img/hot-1.jpeg" alt="A cold color">
			</figure>
			<figure class="left hot">
				<img class="img" src="/img/hot-2.jpeg" alt="A cold color">
			</figure>
			<figure class="left funny">
				<img class="img" src="/img/funny-1.jpeg" alt="A cold color">
			</figure>
			<figure class="left funny">
				<img class="img" src="/img/funny-2.jpeg" alt="A cold color">
			</figure>
					
					
		</section>

	</div>

</div>
    
    </html>