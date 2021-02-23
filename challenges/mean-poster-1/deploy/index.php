<?php
    ob_start();
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    </head>
    <body>
        <span style='color:#FB4;'>Please register or login before accessing the forums<br/></span>
        <form action = "index.php" method = "post">
            Username<br/><input name="username" type ="text"/><br/>
            Password<br/><input name = "password" type = "text"/><br/>
            <input name="submit" type="submit" value="submit"/><br/>
        </form><br/>

        <?php
            if(isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $status = "user";

                $users_file = "users.txt";
                $file_header = fopen($users_file, "r+");

                if($username == "" || $password == "")
                    echo nl2br("Username and Password must be nonempty\n");
                else {
                    $user_exists = false;
                    $combo_exists = false;

                    while(!feof($file_header)) {
                        $curr_user = explode(',', fgets($file_header));
                        $curr_name = "";
                        $curr_pwd = "";
                        $curr_status = "";

                        $curr_name = trim($curr_user[0]);
                        if(isset($curr_user[1]))
                            $curr_pwd = trim($curr_user[1]);
                        if(isset($curr_user[2]))
                            $curr_status = trim($curr_user[2]);

                        if(!empty($curr_name) && !empty($curr_pwd) && !empty($curr_status))
                            if($username == $curr_name) {
                                if($password != $curr_pwd)
                                    $user_exists = true;
                                else if($curr_status == "admin") {
                                    $status = $curr_status;
                                    $combo_exists = true;
                                }
                                else
                                    $combo_exists = true;
                            }
                    }
                    if(!$user_exists) {
                        $user_string = $username . "," . $password . "," . $status . "\r\n";

                        if(!$combo_exists)
                            fwrite($file_header, $user_string);
                        fclose($file_header);

                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        $_SESSION['status'] = $status;
                        header("Location: forum.php");
                    }
                    else {
                        echo nl2br("Username already taken\n");
                        fclose($file_header);
                    }
                }
            }
        ?>
    </body>
</html>
