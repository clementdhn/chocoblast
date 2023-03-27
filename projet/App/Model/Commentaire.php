<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Chocoblast;
use App\Model\Utilisateur;

    class Commentaire extends BddConnect{
        /*-------------------------------
                Attributs
        --------------------------------*/
        private ?int $id_commentaire;
        private ?int $note_commentaire;
        private ?string $text_commentaire;
        private ?string $date_commentaire;
        private ?bool $statut_commentaire;
        private ?Chocoblast $id_chocoblast;
        private ?Utilisateur $auteur_commentaire;
         /*-------------------------------
                Constructeurs
        --------------------------------*/
        public function __construct(){
            $this->id_chocoblast = new Chocoblast();
            $this->auteur_commentaire = new Utilisateur();
        }
        /*-------------------------------
                Getter et setter
        --------------------------------*/
        public function getIdCommentaire():?int{
            return $this->id_commentaire;
        }
        public function getNoteCommentaire():?string{
            return $this->note_commentaire;
        }
        public function getTextCommentaire():?string{
            return $this->text_commentaire;
        }
        public function getDateCommentaire():?string{
            return $this->date_commentaire;
        }
        public function getStatutCommentaire():?bool{
            return $this->statut_commentaire;
        }
        public function getChocoblastCommentaire():?Chocoblast{
            return $this->id_chocoblast;
        }
        public function getAuteurCommentaire():?Utilisateur{
            return $this->auteur_commentaire;
        }
        public function setIdCommentaire(int $id):?void{
            $this->id_commentaire = $id;
        }
        public function setNoteCommentaire(string $note):?void{
            $this->note_commentaire = $note;
        }
        public function setTextCommentaire(string $text):?void{
            $this->text_commentaire = $text;
        }
        public function setDateCommentaire(string $date):?void{
            $this->date_commentaire = $date;
        }
        public function setStatutCommentaire(bool $statut):?void{
            $this->statut_commentaire = $statut;
        }
        public function setChocoblastCommentaire(Chocoblast $choco):?void{
            $this->id_chocoblast = $choco;
        }
        public function setAuteurCommentaire(Utilisateur $auteur):?void{
            $this->auteur_commentaire = $auteur;
        }
        //Méthode qui va ajouter un commentaire en BDD
        public function addCommentaire():void{
            try {
                //récupérer les données
                $id = $this->id_commentaire;
                $note = $this->note_commentaire;
                $text = $this->text_commentaire;
                $date = $this->date_commentaire;
                $statut = $this->statut_commentaire;
                $choco = $this->id_chocoblast->getIdChocoblast();
                $auteur = $this->auteur_commentaire->getIdUtilisateur();
                //préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO commentaire(note_commentaire, text_commentaire, statut_commentaire, date_commentaire, id_chocoblast, auteur_commentaire)
                 VALUES(?,?,?,?,?,?)');
                //bind les paramètres
                $req->bindParam(2, $note, \PDO::PARAM_STR);
                $req->bindParam(3, $text, \PDO::PARAM_STR);
                $req->bindParam(4, $date, \PDO::PARAM_STR);
                $req->bindParam(4, $statut, \PDO::PARAM_BOOL);
                $req->bindParam(4, $choco, \PDO::PARAM_INT);
                $req->bindParam(4, $auteur, \PDO::PARAM_INT);
                //Exécuter la requête
                $req->execute();
            } 
            catch (\Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        
              
        }
    }
        
?>