<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./">Home</a>
    <a href="./page1.php">Page 1</a>
    <a href="./deconnexion.php">deconnexion</a>
<?php
    session_start();
    if(isset($_SESSION['name'])){
        echo '<p>'.$_SESSION['name'].'</p>';
    }
    else{
        echo '<p>déconnecté</p>';
    }
?>
</body>
</html>