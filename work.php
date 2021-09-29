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
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styles3.css">
</head>

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
            <a href="saved_notes.php" class="nav-link">
                <img src="includes/notes.png" alt="icon2 image" >
                <span class="link-text">NOTES</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php"  class="nav-link">
                <img src="includes/exit.png" alt="icon3 image">
                <span class="link-text">EXIT</span>
            </a>
        </li>
    </ul>
</nav>

<main>
    <div align="center"><h3>NOTE WRITER</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            <label>
                <textarea id="user_notes" name="notes" rows="20" cols="100" placeholder="Write your notes here....."></textarea>
            </label>
            <input type="button" onclick="togglePop()" value="Save as">
            <div class="pops" id="pops1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="x-btn" onclick="togglePop()">&times</div>
                    <form class="popup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <label>
                            <h4>ENTER NOTE NAME</h4>
                            <input type="text" name="user_give_filename" placeholder="NOTE NAME">
                            <input type="submit"  value="SAVE NOTE" >
                        </label>
                    </form>
                </div>
            </div>
        </form>
    </div>
    <script>
        function togglePop() {
            document.getElementById("pops1").classList.toggle("active");
        }
    </script>
</main>

</body>
</html>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["notes"])) {
        echo "please enter the note first, before saving the file";
       // header('Location:main.php'); if the note is empty, show invalid or seomthing or something
    }
    else{
        if(isset($_POST["notes"]) && ($_POST["user_give_filename"]))
        {
            $input_file_name = $_POST["user_give_filename"];
            $input_file_name .=".txt";
            $input_file = fopen("includes/user_notes/$input_file_name", 'x+');
            $notes =  $_POST["notes"];
            fwrite($input_file,$notes);
            fclose($input_file);
        }
    }
}

?>
