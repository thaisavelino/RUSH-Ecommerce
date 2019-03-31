<?php
    session_start();
    function delete_usr($user)
    {
        if ($_POST['submit'] == "")
            return ;
        if ($_POST['submit'] == "Supprimer" && $user == "")
        {
            echo "<div style=\"color:red;margin:20px\"> This user dosnt exists !</div>";
            echo "user empty";
        }

		$all_users = unserialize(file_get_contents("./data/passwd"));
        if (($all_users)){
            foreach ($all_users as $arg)
            {
                if ($arg[login] == $user)
                {   
                    unset($arg);
                    header("Location: adminpage.php");
                    return ;
                }
            }
            header("Location: adminpage.php");
        }
    }
    if ($_POST['submit'] == "Supprimer" && $_POST['login'] != NULL)
    {
        $log = $_POST['login'];
        delete_usr($log);
    }
?>