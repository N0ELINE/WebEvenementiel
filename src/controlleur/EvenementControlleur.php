<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOParticipe.php';

require_once '../src/model/User.php';
require_once '../src/model/Participe.php';

class EvenementControlleur {//
    
// -----PARTIE FONCTION GENERALE--------------------------------------------------------------------------
    public function displayEvenements() {
        $daoevent = new DAOEvent();  
        $events=$daoevent->findAll();
        $page= Renderer::render('Evenements.php', compact('events'));
        echo $page;
    }

    public function displayEvenement($id) {
        $daoevent = new DAOEvent();
        $events=$daoevent->find($id);
        $page= Renderer::render('Evenement.php', compact('events'));
        echo $page;
    }

// -----PARTIE FONCTION CLIENT CONNECTES--------------------------------------------------------------------------
    public function sinscrireEvent($idEvent) {
        $daoparticipe= new DAOParticipe();
        $participe=new Participe();
        $participe->setIdEventParticipe($idEvent);
        $participe->setIdUserParticipe($_SESSION["id"]->getId());
        $participe->setNbrPersonnes(htmlspecialchars(isset($_POST["nbrpersonnes"]) ? $_POST["nbrpersonnes"] : NULL));
        $daoparticipe->save($participe);

        header('Location: /');
    }

    public function desinscrireEvent($idEvent) {
        $daoparticipe= new DAOParticipe();
        $participe=new Participe();
        $daoparticipe->remove($idEvent,$_SESSION["id"]->getId());
        $daoparticipe->save($participe);

        header('Location: /');
    }

    public function displaymesevenement() {
        $daoparticipe= new DAOParticipe();

        $participes=$daoparticipe->findbyIdUserParticipe($_SESSION["id"]->getId());
        $events=[];
        foreach($participes as $participe){                                 //tab
            $daoevent = new DAOEvent();  
            $events=$daoevent->find($participe->getIdEventParticipe());     //a voir si le tableau se rempli
        }
        $page= Renderer::render('EvenementMine.php', compact('events'));
        echo $page;
    }

// -----PARTIE FONCTION COLLABORATEUR--------------------------------------------------------------------------
    public function ajouterEvenementCollaborateur() {
        $titre = htmlspecialchars(isset($_POST["titre"]) ? $_POST["titre"] : NULL);
        $monEvent = new Event();
        $monEvent->setNom($titre);
        $monEvent->setDate(date("Y/m/d"));
        $monEvent->setHeure(date("H:i"));
        $daoEvent=new DAOEvent();
        $daoEvent->save($monEvent);

        $lastones=$daoEvent->findEventLastOne();
        $last=$lastones[0];
        $idlast=$last->getId();

        header('Location: /evenement/save',$idlast);

    }

    public function saveEventModify() {
        //recuperer les choses des champs des articles et save grace à modifier

    }

    public function galerieEvenementAddCollaborateur() {

    }

    public function editionEvenementCollaborateur() {

    }

}