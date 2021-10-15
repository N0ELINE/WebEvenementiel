<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class AvisControlleur {//
    public function displayAvis() {
        // $daoavis = new DAOAvis();    
        // $avisformation=$daoavis->findAllFormation();
        // $avisatelier=$daoavis->findAllAtelier();
        // $page= Renderer::render('accueilAvis.php', compact('avisformation,avisatelier'));
        $page= Renderer::render('avisAccueil.php');

        echo $page;
    }

    public function ajouteravisatelier() {
        $daoavis=new DAOAtelier();
        $avis=new Avis();
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

    public function ajouteravisformation() {
        //TODO
    }


}