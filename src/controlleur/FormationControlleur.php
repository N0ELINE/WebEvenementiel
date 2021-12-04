<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOFormation.php';
require_once '../src/model/Formation.php';
require_once '../src/model/TypeFormation.php';

require_once '../src/model/User.php';

class FormationControlleur {
    public function displayformations() { //ok
        $daoform= new DAOFormation();
        $mesFormation=$daoform->findAll();
        $type=$daoform->findAllTypeFormation();
        
         
        $page= Renderer::render('formationAccueil.php',compact('mesFormation','type'));
        echo $page;

    }


    public function displayformation($id) { // question
        $url = parse_ini_file("configApi.ini");
        $response = file_get_contents($url.$id);

        echo "<script > window.onload = function() {
            promise($id);       
        }; </script>";
                
       
       $page= Renderer::render('formationQuizz.php',compact('response'));
        echo $page;
        
    }



}