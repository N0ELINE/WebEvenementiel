<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOAvis.php';
require_once '../src/model/DAOEvent.php';

require_once '../src/model/Avis.php';

class AvisControlleur {
    // public function displayAvis() {
    //     $daoavis = new DAOAvis();    
    //     $avisformation=$daoavis->findAllFormation();
    //     $avisevent=$daoavis->findAllEvent();
    //     $page= Renderer::render('accueilAvis.php', compact('avisformation,avisevent'));
    //     echo $page;
    // }

    public function ajouterAvisEvent() { // a tester
        $daoavis=new DAOAvis();
        $avis = new Avis();
        $vide=false;
        
        $_avis = htmlspecialchars(isset($_POST['avis']) ? $_POST['avis'] : NULL);
        if ($_avis==NULL){
            $_avis="";
            $vide=true;
        }
        $avis->setContenu($_avis);
        
        $_etoiles = htmlspecialchars(isset($_POST['etoiles']) ? $_POST['etoiles'] : NULL);
        if ($_etoiles==NULL){
            $_etoiles="";
            $vide=true;
        }
        $avis->setEtoiles($_etoiles);

        if($vide==false){
            $daoavis->saveAvisEvent($avis);

            //TODO enregistrer dans table avisatelier dans DAO
            
            header('Location: /evenement/all');
            exit();
        }
        else{
            echo("problème dans la création de l'avis");
            header('Location: /evenement/all');
        }
    }

    public function ajouterAvisFormation($id) { // a tester
        $content = htmlspecialchars(isset($_POST["commentaire"]) ? $_POST["commentaire"] : NULL);
        $etoiles = htmlspecialchars(isset($_POST["etoiles"]) ? $_POST["etoiles"] : NULL);
        $daoavis = new DAOAvis();
        $avis = new Avis();
        $avis->setContenu($content);
        $avis->setEtoiles($id);
        $avis->setIdUserAvis($_SESSION["id"]);
        $article=$daoavis->saveAvisFormation($avis);
        header('Location: /blog/article/'.$id);
    }


}