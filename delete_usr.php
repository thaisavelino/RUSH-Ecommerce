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
        //print_r($all_users);
        if (($all_users)){
            foreach ($all_users as $arg)
            {
                if ($arg[login] == $user)
                {   
                    echo ("user :$user\n");
                    unset($arg);
                  //  unset($GLOBALS[$user]);
                   file_put_contents("./data/passwd", serialize($all_user));
                }
                   // if ($arg['login'] == $user)
                    //{
                     //   $arg['login'] = "";
                        //file_put_contents('.data/passwd', serialize($arg['login']));
                    //    header("Location: adminpage.php");
            }
        } else {echo ("user doenst exist");}
    }
    if ($_POST['submit'] == "Supprimer" && $_POST['login'] != NULL)
    {
        $log = $_POST['login'];
        delete_usr($log);
    }
?>