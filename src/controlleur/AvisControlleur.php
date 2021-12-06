<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOAvis.php';
require_once '../src/model/DAOEvent.php';

require_once '../src/model/Avis.php';

class AvisControlleur {

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

        $avis->setidConcerne($idEvent);
        $avis->getidUserAvis($_SESSION["id"]);
            //var_dump($avis);
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