<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;
    class Utilisateur extends BddConnect{
        
//attributs
        
        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private ?Roles $roles;

//constructeur

        public function __construct(){
            //instancier un objet role quand on crée un utilisateur
            //$this->roles = new Roles('user');
        $this->roles = new Roles();
        //Set de l'id_roles
        $this->roles->setIdRoles(1);
        }
        public function getIdUtilisateur():?int{
            return $this->id_utilisateur;
        }
        public function getNomUtilisateur():?string{
            return $this->nom_utilisateur;
        }
        public function getPrenomUtilisateur():?string{
            return $this->prenom_utilisateur;
        }
        public function getMailUtilisateur():?string{
            return $this->mail_utilisateur;
        }
        public function getPasswordUtilisateur():?string{
            return $this->password_utilisateur;
        }
        public function setIdUtilisateur($name):void{
            $this->id_utilisateur = $name;
        }
        public function setNomUtilisateur($name):void{
            $this->nom_utilisateur = $name;
        }
        public function setPrenomUtilisateur($firstName):void{
            $this->prenom_utilisateur = $firstName;
        }
        public function setMailUtilisateur($mail):void{
            $this->mail_utilisateur = $mail;
        }
        public function setPasswordUtilisateur($pwd):void{
            $this->password_utilisateur = $pwd;
        }
    /*-----------------------
                    Méthodes
            ------------------------*/
//méthode pour ajouter un utilisateur en BDD
public function addUser():void{
    try {
        //récupérer les données
        $nom = $this->nom_utilisateur;
        $prenom = $this->prenom_utilisateur;
        $mail = $this->mail_utilisateur;
        $password = $this->password_utilisateur;
        //préparer la requête
        $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, 
        prenom_utilisateur, mail_utilisateur, password_utilisateur) VALUES(?,?,?,?)');
        //bind les paramètres
        $req->bindParam(1, $nom, \PDO::PARAM_STR);
        $req->bindParam(2, $prenom, \PDO::PARAM_STR);
        $req->bindParam(3, $mail, \PDO::PARAM_STR);
        $req->bindParam(4, $password, \PDO::PARAM_STR);
        //Exécuter la requête
        $req->execute();
    } 
    catch (\Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    }

    //méthode pour récupérer un utilisateur avec son mail
    public function getUserByMail():?array{
    //exécution de la requête
    try {
        //récupération du mail
        $mail = $this->mail_utilisateur;
        //préparation de la requête
        $req = $this->connexion()->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur,
        mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur, id_roles
        FROM utilisateur WHERE mail_utilisateur = ?');
        //bind des paramètres
        $req->bindParam(1, $mail, \PDO::PARAM_STR);
        //éxécution de la requête
        $req->execute();
        //récupération sous forme de tableau d'objets
        $data = $req->fetchAll(\PDO::FETCH_OBJ);
        //retour du tableau
        return $data;
    }
    //gestion des erreurs (Exception)
    catch (\Exception $e){
        //affichage de l'erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //Méthode qui retourne tous les utilisateurs
    public function getUserAll():?array{
        try{
            //Préparer la requête
            $req = $this->connexion()->prepare('SELECT id_utilisateur, nom_utilisateur, 
            prenom_utilisateur, mail_utilisateur, image_utilisateur FROM utilisateur');
            //Exécuter la requête
            $req->execute();
            //Récupérer la liste des utilisateurs
            $data = $req->fetchAll(\PDO::FETCH_OBJ);
            //retourner le tableau
            return $data;
        } 
        catch(\Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Méthode toString
    public function __toString():string{
        return $this->nom_utilisateur;
    }
}
?>