<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class FormationControlleur {
    public function displayformations() {
        //var_dump("bonjour madame");
         $page= Renderer::render('formationAccueil.php');
        echo $page;

    }

    public function displayformation() {
        $page= Renderer::render('formationQuizz.php');
        echo $page;
    }

    public function mesformations() {
        $page= Renderer::render('formationOne.php');
        echo $page;
    }

    public function displayQuizzformations() {
        $page= Renderer::render('formationQuizz.php');
        echo $page;

    }

}