<?php
if (check_login() !== "admin")
{
    echo "Vous n'êtes pas adminstrateur désolé\n";
    exit();
}
if (check_login() === "admin" && isset($_POST["login"]) && isset($_POST["submit"]) && $_POST["login"] !== "")
{   
    if ($_SESSION["loggued_on_user"] == ($_POST["login"]))
    {
        echo"Vous ne pouvez pas vous supprimer vous même\n";
        exit(); // Mettre une limitation temps
    }
    $fp = fopen("data/users", "r+");
    flock($fp, LOCK_EX);
    $series = file_get_contents("data/users");
    $tab = unserialize($series);
    foreach ($tab as $key=>$row)
    {
        foreach ($row as $ind=>$value)
        {
            if ($ind === "login" && $value === ($_POST["login"]) && $row["statut"] === "admin")
            {
                echo("Vous ne pouvez pas supprimer un administrateur<br>");
                echo "<script>setTimeout(\"location.href = 'del_user.php';\",1500);</script>";
                flock($fp, LOCK_UN);
                exit();
            } 
            if ($ind === "login" && $value === ($_POST["login"]) && $row["statut"] !== "admin")
            {
                unset($tab[$key]);
                $base = serialize($tab);
                file_put_contents('data/users', $base);
                flock($fp, LOCK_UN);
                echo("Utilisateur supprimé<br>");
                echo "<script>setTimeout(\"location.href = 'del_user.php';\",1500);</script>";
                exit();
            }
        }
    }
    echo("Utilisateur non-trouvé\n");
    exit(); // Mettre une limitation temps
    flock($fp, LOCK_UN);
}
?>