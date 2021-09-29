<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>َNOTER</title>
    <link rel="shortout icon" type="image/x-icon" href="includes/favicon.png" />
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<form class="box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h1>SIGN IN</h1>
    <label>
        <input type="text" name="username" placeholder="USERNAME">
        <input type="password" name="password" placeholder="PASSWORD">
        <input type="submit" value="LOGIN">
    </label>
    <h4>Haven't register? <a href="register.php">Sign Up</a> now !</h4>
</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    if ((empty($_POST["username"])) && (empty($_POST["password"]))) {
        echo "username and password  is not entered";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["username"])) {
        echo "incorrect format for username has been entered";
    } elseif (empty($_POST["username"])) {
        echo "username is not entered";
    } elseif (empty($_POST["password"])) {
        echo "password is not entered";
    } else {
        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);
        $status = false;
        $login_file = fopen('includes/login_info.txt', 'r');
        while(!feof($login_file))
        {
            $line = str_replace("\r\n","",fgets($login_file));
            $user_info = array_pad(explode(",",$line),2,null);
            list($username_from_file,$password_from_file) = $user_info;
            if (($username == $username_from_file) && ($password == $password_from_file))
            {
                $status = true;
                $_SESSION["name"]=$username;
                break;
            }
        }
        if ($status == true) {
            header('Location:work.php');
        }
        if($status == false) {
            header('Location:register.php');
        }
        fclose($login_file);
    }
}
?>

