<?php
    //importer les ressources
    use App\Controller\UserController;
    use App\Controller\RolesController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include  './App/Model/Roles.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';
    include './App/Controller/RolesController.php';

 //Analyse de l'URL avec parse_url() et retourne ses composants
 $url = parse_url($_SERVER['REQUEST_URI']);
 //test soit l'url a une route sinon on renvoi à la racine
 $path = isset($url['path']) ? $url['path'] : '/';
 //instance des controllers
 $userController = new UserController();
 $rolesController = new RolesController();
 //routeur
 switch ($path) {
     case '/chocoblast/projet/':
         include './App/Vue/home.php';
         break;
     case '/chocoblast/projet/addUser':
        //appel de la fonction insertUser
        $userController->insertUser();
         break;
    case '/chocoblast/projet/addRoles':
        $rolesController->insertRoles();
         break;
        
     default:
         include './App/Vue/error.php';
         break;
 }

//Getters et setters



?>