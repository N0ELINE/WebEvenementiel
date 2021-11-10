<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOAvis.php';
require_once '../src/model/DAOEvent.php';

require_once '../src/model/Avis.php';

class AvisControlleur {//
    public function displayAvis() {
        $daoavis = new DAOAvis();    
        $avisformation=$daoavis->findAllFormation();
        $avisatelier=$daoavis->findAllAtelier();
        $page= Renderer::render('accueilAvis.php', compact('avisformation,avisatelier'));
        echo $page;
    }

    public function ajouterAvisAtelier() {
        $daoavis=new DAOEvent();
        $avis=new Event();
        $vide=false;
        
        $_avis = htmlspecialchars(isset($_POST['avis']) ? $_POST['avis'] : NULL);
        if ($_avis==NULL){
            $_avis="";
            $vide=true;
        }
        $avis->setLogin($_avis);
        
        $_etoiles = htmlspecialchars(isset($_POST['etoiles']) ? $_POST['etoiles'] : NULL);
        if ($_etoiles==NULL){
            $_etoiles="";
            $vide=true;
        }
        $avis->setMdp($_etoiles);

        if($vide==false){
            $daoavis->save($avis);

            //TODO enregistrer dans table avisatelier dans DAO
            
            header('Location: /atelier/all');
            exit();
        }
        else{
            echo("problème dans la création de l'avis");
            header('Location: /atelier/all');
        }
    }

    public function ajouterAvisFormation($id) {
        $content = htmlspecialchars(isset($_POST["commentaire"]) ? $_POST["commentaire"] : NULL);
        $etoiles = htmlspecialchars(isset($_POST["etoiles"]) ? $_POST["etoiles"] : NULL);
        $daoavis = new DAOAvis();
        $avis = new Avis();
        $avis->setContenu($content);
        $avis->setEtoiles($id);
        $avis->setIdUserAvis($_SESSION["id"]);
        $article=$daoavis->save($commantaire);
        header('Location: /blog/article/'.$id);
    }


}