<?php
//Test si connecté
if(isset($_SESSION['connected'])){
?>
    <!--connecté-->
    <div id="navbar">
        <li><a href="./">Home</a></li>
        <li><a href="./chocoblastAdd">Ajouter chocoblast</a></li>
        <li><a href="./deconnexion">Deconnexion</a></li>
    </div>
<?php
}
    //Test sinon non connecté
    else{
?>
    <!-- déconnecté -->
    <div id="navbar">
        <li><a href="./">Home</a></li>
        <li><a href="./addUser">Inscription</a></li>
        <li><a href="./addRoles">Ajouter Role</a></li>
        <li><a href="./connexion">Connexion</a></li>
    </div>
<?php
        }
?>

