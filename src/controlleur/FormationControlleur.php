<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class ClientController {
    public function displayformations() {
        $page= Renderer::render('FormationAccueil.php');
        echo $page;

    }

    public function displayformation() {

    }

    public function mesformations() {

    }

}