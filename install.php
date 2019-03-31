<?php
	// creer tables (categories : fruits,legumes,epices,condiments) --> data
	// Download les images
	// creer un compte administrateur 
	// changer create createadmin
	// header(Location : index.php);

	$data['cold'] = array(
		"cold-1" => array("price" => "1", "img" => "img/cold-1.png"),
		"cold-2" => array("price" => "1", "img" => "img/cold-2.png"),
		"cold-3" => array("price" => "1", "img" => "img/cold-3.png"),
		"cold-4" => array("price" => "1", "img" => "img/cold-4.png")
	);
	$data['hot'] = array(
		"hot-1" => array("price" => "1", "img" => "img/hot-1.png"),
		"hot-2" => array("price" => "1", "img" => "img/hot-2.png")
	);
	$data['funny'] = array(
		"funny-1" => array("price" => "1", "img" => "img/funny-1.png"),
		"funny-2" => array("price" => "1", "img" => "img/funny-2.png"),
		"funny-3" => array("price" => "1", "img" => "img/funny-3.png")
	);
	if(file_put_contents("./data/product", serialize($data)) === FALSE)
		echo "INSTALL ERROR\n";
?>
<html>
	<body>
		<div class="loginform"><p >
			<form action="create" method="post">
			Identifiant administrateur: <input type="text" name="login" value="root"/>
			<br />
			Mot de passe administrateur: <input type="password" name="passwd" />
			</b>
			<input type="submit" name="submit" value="OK" />
			</form>
		</p></div>
</body>
</html>
