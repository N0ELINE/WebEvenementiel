<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOParticipe.php';
require_once '../src/model/DAOEvent.php';
require_once '../src/model/DAOPhotoGalerieEvent.php';

require_once '../src/model/User.php';
require_once '../src/model/Participe.php';

class ClientController {
    public function displayclienttdb() {
        
    }

    public function displayevenements() {
        $daoevent = new DAOEvent();    
        $events=$daoevent->findAll();
        $page= Renderer::render('clientEvenements.php', compact('events'));
        echo $page;
    }

    public function displayevenement($id) {
        $daoevent = new DAOEvent();    
        $event=$daoevent->findById($id);

        //savoir si on affiche galerie 1 co 2 event passé 3 participe
        $galeriePaths=[];

        if($_SESSION["role"]->getNom()=='client' AND $event->getDate()<SYSDATE() AND findOne($event->getId,$_SESSION["id"]->getId())!=null){
            //cherche galerie
            $daophoto = new DAOPhotoGalerieEvent();    
            $galeriePaths=$daophotogalerieevent->findByIdEvent($event->getId());
        }
        $page= Renderer::render('clientEvenement.php', compact('event,galeriePaths'));
        echo $page;
    }

    public function displaymesevenement() {
        $daoparticipe= new DAOParticipe();

        $participes=$daoparticipe->findbyIdUserParticipe($_SESSION["id"]->getId());
        $events=[];
        foreach($participes as $participe){                                 //tab
            $daoevent = new DAOEvent();  
            $events=$daoevent->find($participe->getIdEventParticipe());     //a voir si le tableau se rempli
        }

        $page= Renderer::render('clientMesEvenement.php', compact('events'));
        echo $page;
    }

    //sinscrire
    public function sinscrire($idEvent) {
        $daoparticipe= new DAOParticipe();
        $participe->setIdEventParticipe($idEvent);
        $participe->setIdUserParticipe($_SESSION["id"]->getId());
        $participe->setNbrPersonnes(htmlspecialchars(isset($_POST["nbrpersonnes"]) ? $_POST["nbrpersonnes"] : NULL));
        $daoparticipe->save($participe);

        header('Location: ');
    }

    //se desinscrire
    
}