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

    public function ajouterAvisEvent($idEvent) { //OK
       
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

        $avis->setidConcerne($idEvent);

        if($vide==false){
            $daoavis->saveAvisEvent($avis);
            
            echo("Avis ajouté avec succès");
            header('Location: /evenement/one/'.$idEvent);
            exit();
        }
        else{
            echo("problème dans la création de l'avis");
            header('Location: /evenement/one/'.$idEvent);
        }
    }

}