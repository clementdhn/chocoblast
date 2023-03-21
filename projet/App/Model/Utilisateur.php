<?php
    namespace App\Model;
    use App\Utilis\BddConnect;
    use App\Model\Roles;
    class Utilisateur{
        
//attributs
        
        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private $roles;

//constructeur

        public function __construct(){
            //instancier un objet role quand on crée un utilisateur
            $this->roles = new Roles('user');
        }
    }


?>