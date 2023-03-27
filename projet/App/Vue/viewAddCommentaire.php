<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Add Commentaire</title>
</head>
<body>
    <!--import du menu-->
    <?php include './App/Vue/viewMenu.php';?>
    <div class="form">
        <form action="" method="post">
            <input type="text" name = "note_chocoblast">
            <input type="text" name = "text_chocoblast">
            <input type="text" name = "statut_chocoblast">
            <input type="date" name = "date_chocoblast">
            <input type="submit" value="Ajouter" name="submit">

</body>
</html>