<?php
    namespace App\Utils;
    class Fonctions{
        //nettoyage des entréesde formulaire
        public static function cleanInput($value){
            return htmlspecialchars(strip_tags(trim($value)));
        }
    }
?>