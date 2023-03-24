<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./">Home</a>
    <a href="./page2.php">Page 2</a>
<?php
    session_start();
    echo '<p>'.$_SESSION['mail'].'</p>';
    echo '<p>'.$_SESSION['entreprise'].'</p>';
?>
</body>
</html>