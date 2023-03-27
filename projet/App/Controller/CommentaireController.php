<?php
namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Utilisateur;
use App\Model\Chocoblast;
use App\Model\Commentaire;

class CommentaireController extends Commentaire{
//fonction qui va ajouter un commentaire en BDD
public function insertCommentaire():void{
    //tester si l'utilisateur est connecté
    if(isset($_SESSION['connected'])){
    //tester si le formulaire est submit
    if (isset($_POST['submit'])){
        //Nettoyer les inputs
        $note = Fonctions::cleanInput($_POST['note_commentaire']);
        $text = Fonctions::cleanInput($_POST['text_commentaire']);
        $date = Fonctions::cleanInput($_POST['date_commentaire']);
        $auteur = Fonctions::cleanInput($_SESSION['id']);
        $choco = Fonctions::cleanInput($_GET['id_chocoblast']);
    //tester si les champs sont remplis
    if(!empty($note) AND !empty($text) AND !empty($date) 
    AND !empty($choco) AND !empty($auteur)){
        $this->setNoteCommentaire($note);
        $this->setTextCommentaire($text);
        $this->setDateCommentaire($date);
        $this->getAuteurCommentaire()->setIdUtilisateur($auteur);
        $this->getChocoblastCommentaire()->setIdChocoblast($choco);
        echo '<pre>';
        var_dump($this);
        //Ajouter en BDD le commentaire
        $this->addCommentaire();
        $msg = "Le commentaire : du chocoblast : ".$choco." a été ajouté en BDD";
        
        echo '<script>
        setTimeout(()=>{
            modal.style.display = "block";
        }, 500);
    </script>';
    }   
    //Tester sinon les champs ne sont pas remplis
    else{
        $msg = "Veuillez remplir tous les champs de formulaire";
        echo '<script>
            setTimeout(()=>{
                modal.style.display = "block";
            }, 500);
        </script>';
    }
    }
    //Importer la vue
    include './App/Vue/viewAddCommentaire.php';
    }
    //Test sinon redirection vers la affichage de tous les chocoblasts
    else{
    header('Location: ./chocoblastAll');
        }
    }
}
 
?>