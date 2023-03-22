<?php
namespace App\Controller;


use App\Model\Utilisateur;
use App\Utils\Fonctions;
class UserController extends Utilisateur{
    //fonction qui va gérer l'ajout d'un utilisateur en BDD
    public function insertUser(){
        $msg = "";
        /*logique*/
        //test si le bouton est cliqué
        if (isset($_POST['submit'])){
            //récupération et nettoyage des inputs utilisateurs
            $nom = Fonctions::cleanInput($_POST['nom_utilisateur']);
            $prenom = Fonctions::cleanInput($_POST['prenom_utilisateur']);
            $mail = Fonctions::cleanInput($_POST['mail_utilisateur']);
            $password = Fonctions::cleanInput($_POST['password_utilisateur']);
            //tester si les champs sont remplis
            if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND!empty($password)){
                //hash du mot de passe
                $password = password_hash($password, PASSWORD_DEFAULT);
                //instance d'un objet
                $user = new UserController();
                $user->setNomUtilisateur($nom);
                $user->setPrenomUtilisateur($prenom);
                $user->setMailUtilisateur($mail);
                $user->setpasswordUtilisateur($password);
                echo var_dump($user);
                $user->addUSer();
                $msg = "Le compte : ".$mail."a été ajouté à la BDD";
            }
            //sinon si les champs ne sont pas remplis
            else{
                $msg = "Veuillez remplir tous les champs du formulaire";
            }
        
    }
        //importer la vue
        include './App/Vue/viewAddUser.php';
    }
}

?>