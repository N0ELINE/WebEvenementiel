<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class FormationControlleur {
    public function displayformations() { //ok
        //var_dump("bonjour madame");
         $page= Renderer::render('formationAccueil.php');
        echo $page;

    }

    public function displayformation() { // question
        //requete api pour recup question reponse ??? TODO Athé

<<<<<<< HEAD
    public function mesformations() {
        $page= Renderer::render('formationOne.php');
        echo $page;
    }

    public function displayQuizzformations() {
=======

>>>>>>> 2fc9b274af846ce9d84e079af535fbab506b11dd
        $page= Renderer::render('formationQuizz.php');
        echo $page;
    }

}