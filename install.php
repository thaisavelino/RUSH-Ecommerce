<?PHP
if (!file_exists("data"))
{
    mkdir("data");
}
    if (!file_exists("data/categories"))
    {
        $tab[] = array("categories"=>"rouge", "violet");
        $tab[] = array("categories"=>"bleu", "vert");
        $tab[] = array("categories"=>"arc-en-ciel");
        $str = serialize($tab);
        file_put_contents("data/categories", $str);
    }
    if (!file_exists("data/produits"))
    {
        if (!file_exists("data/images"))
        {
            mkdir("data/images");
        }
        file_put_contents("data/images/".".jpg", file_get_contents(".jpg"));
        $tab2[] = array("name"=>"colors", "prix"=>"100", "img"=>"data/images/name_image");
        $str = serialize($tab2);
        file_put_contents("data/produits", $str);
    }
if (!file_exists("data/users") && isset($_POST) && isset($_POST["login"]) && isset($_POST["passwd"]) && isset($_POST["submit"]))
{
    $zou = hash("whirlpool", htmlspecialchars($_POST["passwd"]));
    $tab3[] = array("login"=>htmlspecialchars($_POST["login"]), "passwd"=>$zou, "mail"=>"admin@admin.ru", "statut"=>"admin");
    $str = serialize($tab3);
    file_put_contents("data/users", $str);
    header("location: index.php");
}
?>