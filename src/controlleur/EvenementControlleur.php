<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOParticipe.php';

require_once '../src/model/User.php';
require_once '../src/model/Participe.php';

class EvenementControlleur {//
    
// -----PARTIE FONCTION GENERALE--------------------------------------------------------------------------
    public function displayEvenements() { //OK
        $daoevent = new DAOEvent();  
        $events=$daoevent->findAll();
        $page= Renderer::render('Evenements.php', compact('events'));
        echo $page;
    }

    public function displayEvenement($id) { //OK
        $daoevent = new DAOEvent();
        $event=$daoevent->find($id);
        $page= Renderer::render('Evenement.php', compact('event'));
        echo $page;
    }

// -----PARTIE FONCTION CLIENT CONNECTES--------------------------------------------------------------------------
    public function sinscrireEvent($idEvent) { //ok
        $daoparticipe= new DAOParticipe();
        $participe=new Participe();
        $participe->setIdEventParticipe($idEvent);
        $participe->setIdUserParticipe($_SESSION["id"]);
        $participe->setNbrPersonnes(htmlspecialchars(isset($_POST["nbrpersonnes"]) ? $_POST["nbrpersonnes"] : NULL));
        $daoparticipe->save($participe);
        header('Location: evenement/one/'.$idEvent);
    }

    public function displaymesevenement() { //ok
        $daoparticipe= new DAOParticipe();
        $participes=$daoparticipe->findbyIdUserParticipe($_SESSION["id"]);
        $events=[];
        foreach($participes as $participe){     
            $daoevent = new DAOEvent();  
            $events=$daoevent->find($participe->getIdEventParticipe()); 
        }
        $page= Renderer::render('EvenementMine.php', compact('events'));
        echo $page;
    }

// -----PARTIE FONCTION COLLABORATEUR--------------------------------------------------------------------------
    public function ajouterEvenementCollaborateur() { //OK
        $titre = htmlspecialchars(isset($_POST["titre"]) ? $_POST["titre"] : NULL);
        $monEvent = new Event();
        $monEvent->setNom($titre);
        $daoEvent=new DAOEvent();
        $monEvent->setDate(date("Y-m-d"));
        $monEvent->setHeure(date("H:i:s"));
        $daoEvent->save($monEvent);
        $lastones=$daoEvent->findEventLastOne();
        $last=$lastones[0];
        $idlast=$last->getId();
        header('Location: /evenement/edition/'.$idlast);
    }

    public function saveEventModify($idEvent) { //OK

        $monEvent = new Event();
        
        $daoEvent=new DAOEvent();
        $monEvent=$daoEvent->find($idEvent);

        $monEvent->setNom(htmlspecialchars(isset($_POST["nom"]) ? $_POST["nom"] : NULL));
        $monEvent->setDescription(htmlspecialchars(isset($_POST["description"]) ? $_POST["description"] : NULL)) ;
        $monEvent->setDureeMinute((int)htmlspecialchars(isset($_POST["duree"]) ? $_POST["duree"] : NULL));
        $monEvent->setEffectifMax((int)htmlspecialchars(isset($_POST["effectif"]) ? $_POST["effectif"] : NULL));
        $monEvent->setLocalisation(htmlspecialchars(isset($_POST["localisation"]) ? $_POST["localisation"] : NULL));

        $daoEvent->update($monEvent);

        header('Location: /evenement/edition/'.$idEvent);
        var_dump("article modifié avec succès");

    }

    public function editionEvenementCollaborateur($idEvent) { //ok
        $daoevent = new DAOEvent();
        $event=$daoevent->find($idEvent);
        $page= Renderer::render('EvenementEdition.php', compact('event'));
        echo $page;
    }
    

}