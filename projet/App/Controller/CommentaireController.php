<?php
namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Utilisateur;
use App\Model\Chocoblast;
use App\Model\Commentaire;

class CommentaireController extends Commentaire{
public function insertCommentaire():void{
    $msg ="";
    if (isset($_POST['submit'])){
        if(isset($_SESSION['connected'])){
            //Générer la liste déroulante cible
            $user = new Utilisateur();
            $data = $user->getUserAll();
        //Nettoyer les inputs
        $note = Fonctions::cleanInput($_POST['note_commentaire']);
        $text = Fonctions::cleanInput($_POST['text_commentaire']);
        $date = Fonctions::cleanInput($_POST['date_commentaire']);
        $statut = Fonctions::cleanInput($_POST['statut_commentaire']);
        $choco = Fonctions::cleanInput($_POST['id_chocoblast']);
        $auteur = Fonctions::cleanInput($_POST['auteur_commentaire']);
    }
    //test si les champs sont remplis
    if(!empty($note) AND !empty($text) AND !empty($date) 
    AND !empty($statut) AND !empty($choco) AND !empty($auteur)){
        $this->setNoteCommentaire($note);
        $this->setTextCommentaire($text);
        $this->setDateCommentaire($date);
        $this->setStatutCommentaire($statut);
        //$this->setChocoblastCommentaire($choco);
        //$this->setAuteurCommentaire($auteur);
    //Tester si le commentaire existe déjà
    }
    }
    //Import de la vue
    include './App/Vue/viewAddCommentaire.php';
}

}
?>