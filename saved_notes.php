<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>َNOTER</title>
    <link rel="shortout icon" type="image/x-icon" href="includes/favicon.png" />
    <link rel="stylesheet" href="styles3.css">
    <link rel="stylesheet" href="style4.css">
</head>

<?php
    $folder_path = "includes/user_notes";
    if(is_dir($folder_path))
    {
        $user_files = opendir($folder_path);
        {
            if($user_files)
            {
                $notes_name_array = array();
                $notes_content_array = array();
                while(($notes_name = readdir($user_files)) !== FALSE)
                {
                    if($notes_name != '.' && $notes_name != '..' && $notes_name != '...')
                    {
                        $note_handler = fopen("includes/user_notes/$notes_name", 'r+');
                        while(!feof($note_handler))
                        {
                            $notes_content = fgets($note_handler); // the content of the file
                        }
                        $notes_name = str_replace(".txt","", $notes_name);
                        $notes_name_array[] = $notes_name;
                        $notes_content_array[] = $notes_content;
                        fclose($note_handler);
                    }

                }
            }
        }
    }
?>

<body>

<nav class="navbar">
    <ul class="navbar-nav">
        <li class="main_logo">
            <a href="#" class="nav-link">
                <span class="link-text">NOTER</span>
                <img src="includes/logo1.png" alt="logo image" >
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <img src="includes/user.png" alt="icon1 image" >
                <span class="link-text"><?php echo $_SESSION["name"] ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a href="work.php" class="nav-link">
                <img src="includes/write.png" alt="icon5 image" >
                <span class="link-text">EDITOR</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php" class="nav-link">
                <img src="includes/exit.png" alt="icon3 image">
                <span class="link-text">EXIT</span>
            </a>
        </li>
    </ul>
</nav>

<main>
    <h3>SAVED NOTES</h3>
    <div class="box1">
        <span></span>
        <h5>
            <?php
            if(isset($notes_name_array[0]))
                echo $notes_name_array[0];
            else echo null;
            ?>
        </h5>
        <p>
            <?php
            if(isset($notes_content_array[0]))
                echo $notes_content_array[0];
            else echo null;
            ?>
        </p>
    </div>
    <div class="box2">
        <span></span>
        <h5>
            <?php
            if(isset($notes_name_array[1]))
                echo $notes_name_array[1];
            else echo null;
            ?>
        </h5>
        <p>
            <?php
            if(isset($notes_content_array[1]))
                echo $notes_content_array[1];
            else echo null;
            ?>
        </p>
    </div>
    <div class="box3">
        <span></span>
        <h5>
            <?php
            if(isset($notes_name_array[2]))
                echo $notes_name_array[2];
            else echo null;
            ?>
        </h5>
        <p>
            <?php
            if(isset($notes_content_array[2]))
                echo $notes_content_array[2];
            else echo null;
            ?>
        </p>
    </div>
</main>

</body>

</html>

