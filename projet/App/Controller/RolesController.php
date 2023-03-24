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
                if($this->getRolesByName()){
                    $msg = "Le role : ".$nom." existe déja en BDD";
                }
                //Test si il n'existe pas 
                else{
                    //Ajouter en BDD le nouveau role
                    $this->addRoles();
                    //Afficher la confirmation
                    $msg = "Le role : ".$nom." à été ajouté en BDD";
                }
            }
            //Test si les champs sont vides
            else{
                //afficher l'erreur
                $msg = "Veuillez remplir les champs de formulaire";
            }
        }
        //Importer la vue
        include './App/Vue/viewAddRoles.php';
    }
}
            
?>