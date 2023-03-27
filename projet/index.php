<?php
    //démarrage de la session
    session_start();
    //importer les ressources
    use App\Controller\UserController;
    use App\Controller\RolesController;
    use App\Controller\ChocoblastController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    //include le model et le controller Roles
    include  './App/Model/Roles.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';
    include './App/Controller/RolesController.php';
    include './App/Model/Chocoblast.php';
    include './App/Controller/ChocoblastController.php';

 //Analyse de l'URL avec parse_url() et retourne ses composants
 $url = parse_url($_SERVER['REQUEST_URI']);
 //test soit l'url a une route sinon on renvoi à la racine
 $path = isset($url['path']) ? $url['path'] : '/';
 //instance des controllers
 $userController = new UserController();
 //instancier le controller roles
 $rolesController = new RolesController();
 //instancier le controller Chocoblast
 $chocoblastController = new ChocoblastController();
 //routeur connecte
 //if(isset($_SESSION['connected'])){
 switch ($path) {
     case '/chocoblast/projet/':
         include './App/Vue/home.php';
         break;
     case '/chocoblast/projet/addUser':
        //appel de la fonction insertUser
        $userController->insertUser();
         break;
    case '/projet/chocoblastAll':
    $chocoblastController->showAllChocoblast();
        break;
    case '/projet/chocoblastDelete':
        header('Location: ./chocoblastAll');
        break;
    case '/projet/chocoblastUpdate':
        header('Location: ./chocoblastAll');
        break;
    //case pour ajouter un role
    case '/chocoblast/projet/addRoles':
        $rolesController->insertRoles();
         break;
    case '/chocoblast/projet/chocoblastAdd':
        $chocoblastController->inserChocoblast();
        break;
    case '/chocoblast/projet/connexion':
        $userController->connexionUser();
            break;
    case '/chocoblast/projet/deconnexion':
        $userController->deconnexionUser();
        break;
     default:
         include './App/Vue/error.php';
         break;
    }
 //}
 /*
 //routeur non connecté
 else{
    switch ($path) {
        case 'chocoblast/projet/':
            include './App/Vue/home.php';
            break;
        case 'chocoblast/projet/addUser':
            $userController->insertUser();
            break;
        case 'chocoblast/projet/chocoblastAll':
            $chocoblastController->showAllChocoblast();
            break;
        case 'chocoblast/projet/chocoblastDelete':
            header('Location: ./chocoblastAll');
            break;
        case 'chocoblast/projet/chocoblastUpdate':
            header('Location: ./chocoblastAll');
            break;
        case 'chocoblast/projet/connexion':
            $userController->connexionUser();
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
}
*/
?>