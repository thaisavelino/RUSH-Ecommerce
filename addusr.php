<?php
//include("index.php");
include("check_login.php");
session_start();
if ($_POST['submit'] == "")
	return ;
if ($_POST['submit'] != "s'inscrire" || $_POST['login'] == "" || $_POST['passwd'] == "")
{
	echo "<div style=\"color:red;margin:20px\"> Il manque quelques chose ... !</div>";
}
else
{
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$hashpw = hash("whirlpool", $passwd);
	$user["login"] = $login;
	$user["passwd"] = $hashpw;

	if (!file_exists("./data"))
		mkdir("./data");
	if (file_exists("./data/passwd"))
		$top_user = unserialize(file_get_contents("./data/passwd"));
	if ($top_user) {
		foreach ($top_user as $arg)
		{
			if ($arg['login'] == $login)
			{
				echo "Le compte existe déja\n";
				return ;
			}
		}
	}
	$top_user[] = $user;
	file_put_contents("./data/passwd", serialize($top_user));
	if ($_SESSION['loggued_on_user'] == "root") {
		header('Location: adminpage.php');
	} else
		header('Location: index?cat=all');
}
?>