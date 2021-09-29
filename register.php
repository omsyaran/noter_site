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
    <h1>CREATE ACCOUNT</h1>
    <label>
        <input type="text" name="new_username" placeholder="USERNAME">
        <input type="password" name="new_password" placeholder="PASSWORD">
        <input type="submit" name="" value="REGISTER">
    </label>
    <h4>Already a member? <a href="index.php">Log In</a> here</h4>
</form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    function validate($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    if ((empty($_POST["new_username"])) && (empty($_POST["new_password"]))) {
        echo "username and password  is not entered";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["new_username"])) {
        echo "incorrect format for username has been entered";
    }
    elseif (empty($_POST["new_username"])) {
        echo "username is not entered";
    }
    elseif (empty($_POST["new_password"])) {
        echo "password is not entered";
    }
    else {
        $new_username = validate($_POST["new_username"]);
        $new_password = validate($_POST["new_password"]);
        $login_file = fopen('includes/login_info.txt', 'a+');
        $move_to_next_line = "\n";
        $user_info_line = $new_username.','.$new_password;
        fwrite($login_file,$move_to_next_line);
        fwrite($login_file,$user_info_line);
        fclose($login_file);
        header('Location:index.php');
    }
}

?>



