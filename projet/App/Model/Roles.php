<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    class Roles extends BddConnect{

    //attributs
    private $id_roles;
    private $nom_roles;

    //constructeur
    public function __construct(){
    /*   $this->id_roles = 1; //forcer
        $this->nom_roles = $name;
    */
    }

    //getter et setters
    public function getIdRoles():?int{
        return $this->id_roles;
    }
    public function getNomRoles():?string{
        return $this->nom_roles;
    }
    public function setNomRoles($name):void{
        $this->nom_roles = $name;
    }

    public function addRoles():void{
        try{
        $nom = $this->nom_roles;
        //préparer la requête
        $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles) VALUES(?)');
        //bind les paramètres
        $req->bindParam(1, $nom, \PDO::PARAM_STR);
        //Exécuter la requête
        $req->execute();
    }
    catch (\Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    }
}
?>