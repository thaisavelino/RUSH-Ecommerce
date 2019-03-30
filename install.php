<?PHP
	// Create the array for the products --> data
	// Create adm account
	// Change the adm account
	// header(Location : index.php);
$data['cold'] = array(
    "cold-1" => array("price" => "25", "img" => "img/cold-1.jpeg"),
    "cold-2" => array("price" => "60", "img" => "img/cold-2.jpeg"),
    "cold-3" => array("price" => "29", "img" => "img/cold-3.jpeg"),
    "cold-4" => array("price" => "36", "img" => "__DIR__/img/cold-4.jpeg")
);
$data['hot'] = array(
    "hot-1" => array("price" => "10", "img" => "__DIR__/img/hot-1.jpeg"),
    "hot-2" => array("price" => "75", "img" => "__DIR__/img/hot-2.jpeg"),  
);
$data['funny'] = array(
    "funny-1" => array("price" => "75", "img" => "__DIR__/img/funny-1.jpeg"),
    "funny-2" => array("price" => "64", "img" => "__DIR__/img/funny-2.jpeg"),
    "funny-3" => array("price" => "52", "img" => "__DIR__/img/funny-3.jpeg"),
);
if(file_put_contents("./data/product", serialize($data)) === FALSE)
		echo "INSTALL ERROR\n";
?>
<html>
	<body>
		<div class="loginform">
            <p >
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