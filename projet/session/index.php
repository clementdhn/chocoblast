<?php
    //démarre la session
    session_start();
    //créer 3 variables session
    $_SESSION['name'] = 'Mathieu';
    $_SESSION['mail'] = 'Mathieu@test.com';
    $_SESSION['entreprise'] = 'Adrar';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./page1.php">page 1</a>
    <a href="./page2.php">page 2</a>
</body>
</html>