<?php
	include('auth.php');
	//include('index.php');
	session_start();
	$login = $_GET['login'];
	if($_GET['login'] === "" || $_GET['passwd'] === "")
	{
		$_SESSION['loggued_on_user'] = "";
		echo "Soyez plus intelligent\n";
	}
	else
	{
		if (auth($_GET['login'],$_GET['passwd']) === TRUE)
		{
			$_SESSION['loggued_on_user'] = $_GET['login'];
			echo "Salut $_login\n";
		}
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo "Il y'a une erreur quelques part\n";
		}
		//header("Location:index.php");
	}
?>