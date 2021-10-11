<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class AccueilController {
public function display() {
    $page = Renderer::render('accueil.php');
    echo $page;
}

public function displayPageContact() {
    $page = Renderer::render('accueilContact.php');
    echo $page;
}

public function envoiContact() {
    $retour = mail('noelinenoeline@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], $_POST['mail']);
    header('Location: /site/contact');
        echo $page;
    echo("votre message à été envoyé");
}
}