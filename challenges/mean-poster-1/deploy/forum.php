<?php
    include("user.php");
    session_start();

    if(!isset($_COOKIE['user'])) {
        $current_user = new User($_SESSION['username'], $_SESSION['password'], 'user');
        setcookie('user', base64_encode(serialize($current_user)));
    }
    else {
        $current_user = unserialize(base64_decode($_COOKIE['user']));
        if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['status'])) {
            if($_SESSION['username'] != $current_user->get_name() || $_SESSION['password'] != $current_user->get_pwd() || $_SESSION['status'] != $current_user->get_status()) {
                $current_user = new User($_SESSION['username'], $_SESSION['password'], $_SESSION['status']);
                setcookie('user', base64_encode(serialize($current_user)));
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    </head>
    <body>
        <a href = "index.php">Back</a><br/>
        <?php
            $username = $current_user->get_name();
            $status = $current_user->get_status();
            echo nl2br("<span style='color:#FB4;'>Welcome $username!\n\n</span>");

            if($status == 'admin' && $username != 'admin') {
                echo nl2br("'$username' is not a valid admin\n");
                $status = "user";
            }
        ?>

        Search for hidden posts by username<br/>
        <form action="forum.php" method="post">
            <input name="post_name" type="text"/><br/>
            <input name="submit" type="submit" value="submit"/><br/>
        </form><br/>

        <?php
            if(isset($_POST['post_name'])) {
                if($status == "admin") {
                    $post_author = "";
                    $search_term = $_POST['post_name'];
                    $post_table = fopen("posts.txt", "r");
                    $post_found = false;
                    
                    echo nl2br("Hidden Posts:\n\n");

                    while(!feof($post_table)) {
                        $curr_post = explode(',', fgets($post_table));
                        $curr_title = "";
                        $curr_author = "";
                        $curr_file = "";
                        $curr_status = "";

                        if(isset($curr_post[0]))
                            $curr_title = trim($curr_post[0]);
                        if(isset($curr_post[1]))
                            $curr_author = trim($curr_post[1]);
                        if(isset($curr_post[2]))
                            $curr_file = trim($curr_post[2]);
                        if(isset($curr_post[3]))
                            $curr_status = trim($curr_post[3]);

                        if(!empty($curr_title) && !empty($curr_author) && !empty($curr_file) && !empty($curr_status)) {
                            if($search_term == $curr_author && $curr_status == "hidden") {
                                echo nl2br("<span style='color:#FB4;'>'$curr_title' by '$curr_author':\n</span>");
                                echo nl2br(file_get_contents("posts/" . $curr_file) . "\n\n");
                                $post_found = true;
                            }
                        }
                    }

                    if(!$post_found)
                        echo nl2br("<span style='color:#FB4;'>'$search_term' has no hidden posts\n\n</span>");

                    fclose($post_table);
                }
                else
                    echo nl2br("Error: only administrators can search for hidden posts\n\n");
            }
        ?>

        Public Posts:<br/><br/>

        <?php
            $post_table = fopen("posts.txt", "r");
            while(!feof($post_table)) {
                $curr_post = explode(',', fgets($post_table));
                $curr_title = "";
                $curr_author = "";
                $curr_file = "";
                $curr_status = "";
                
                if(isset($curr_post[0]))
                    $curr_title = trim($curr_post[0]);
                if(isset($curr_post[1]))
                    $curr_author = trim($curr_post[1]);
                if(isset($curr_post[2]))
                    $curr_file = trim($curr_post[2]);
                if(isset($curr_post[3]))
                    $curr_status = trim($curr_post[3]);

                if(!empty($curr_title) && !empty($curr_author) && !empty($curr_file) && !empty($curr_status)) {
                    if($curr_status == "public") {
                        if($status == "admin")
                            echo nl2br("<span style='color:#FB4;'>'$curr_title' by '$curr_author':\n</span>");
                        else
                            echo nl2br("<span style='color:#FB4;'>'$curr_title' by Unknown:\n</span>");

                        echo nl2br(file_get_contents("posts/" . $curr_file) . "\n\n");
                    }
                }
            }
        ?>
    </body>
</html>