<?php
namespace App\Model;
use App\Utils\BddConnect;
class Roles extends BddConnect{

//attributs
private $id_roles;
private $nom_roles;

//constructeur
public function __construct($name){
    $this->id_roles = 1; //forcer
    $this->nom_roles = $name;
}

//getter et setters
public function getIdRoles():?int{
    return $this->id_roles;
}
public function getNomRoles():?string{
    return $this->nom_roles;
}

}



?>