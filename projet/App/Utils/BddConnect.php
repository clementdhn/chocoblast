<?php
  namespace App\Utils;
  class BddConnect{
      //fonction connexion BDD
      public static function connexion(){
        //import du fichier de configuration
        include './env.php';
        //retour de l'objet PDO
          return new \PDO('mysql:host=localhost;dbname=chocoblast', 'root','', 
          array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
      }
  }
?>