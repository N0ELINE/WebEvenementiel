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
                  
            }       
        $page= Renderer::render('formationAccueil.php',compact('id'));
        echo $page;

    }


    public function displayformation($id) { 
        $url = parse_ini_file("configApi.ini");
        $response = file_get_contents($url.$id);
        //appelle du script quizz lors du chargement de la fenetre
        echo "<script > window.onload = function() {
            promise($id);       
        }; </script>";           
       $page= Renderer::render('formationQuizz.php',compact('response'));
        echo $page;
        
    }



}