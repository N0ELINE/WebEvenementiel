<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class AccueilController {
    public function display() { //ok
        $page = Renderer::render('accueil.php');
        echo $page;
    } 

    public function displayPageContact() {  //ok
        $page = Renderer::render('accueilContact.php');
        echo $page;
    }

    public function envoiContact() {
        // $name = htmlspecialchars(isset($_POST["name"]) ? $_POST["name"] : NULL);
        $mail = htmlspecialchars(isset($_POST["mail"]) ? $_POST["mail"] : NULL);
        $text = htmlspecialchars(isset($_POST["text"]) ? $_POST["text"] : NULL);

        if(!mail('noelinenoeline@gmail.com', 'Envoi depuis la page Contact', $text, $mail)){
            echo ("erreur");
        }else{
            header('Location: /site/accueil');
            echo("votre message à été envoyé");
        }
    }
}