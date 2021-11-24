<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOFormation.php';
require_once '../src/model/Formation.php';

require_once '../src/model/User.php';

class FormationControlleur {
    public function displayformations() { //ok
        $daoform= new DAOFormation();
        $mesFormation=$daoform->findAll();
        
            foreach($mesFormation as $myForm){
                $id=$myForm->getIdFormation();
                //var_dump($id);    
            }       
        $page= Renderer::render('formationAccueil.php',compact('id'));
        echo $page;

    }

    public function displayformation($id) { // question
        // requete api pour recup question reponse ??? TODO Athé
        $response = file_get_contents('http://127.0.0.4:8080/?id='.$id);
        //var_dump($response);
        $page= Renderer::render('formationQuizz.php',compact('response'));
        echo $page;
    }

}