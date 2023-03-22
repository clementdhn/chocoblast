<?php
namespace App\Controller;
    use App\Model\Roles;
    use App\Utils\Fonctions;
    class RolesController extends Roles{
        //fonction qui va gérer l'ajout d'un utilisateur en BDD
        public function insertRoles(){
            $msg = "";
            if (isset($_POST['submit'])){
                //récupération et nettoyage des inputs utilisateurs
                $nom = Fonctions::cleanInput($_POST['nom_roles']);
                //tester si les champs sont remplis
            if(!empty($nom)){
                $this->setNomRoles($nom);
            $this->addRoles();
            $msg = "Le compte : ".$nom." a été ajouté en BDD";
        }
    }
    else{
        $msg = "Veuillez remplir tous les champs du formulaire";
    }
    //importer la vue
    include './App/Vue/viewAddRoles.php';
}
    }
?>