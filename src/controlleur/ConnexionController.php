<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOLogs.php';
require_once '../src/model/Session.php';

require_once '../src/model/User.php';
require_once '../src/model/Logs.php';

class ConnexionController
{

    public function display()     { //ok
        $page = Renderer::render('connexion.php');
        echo $page;
    }
  

    public function newConnexion()     { //ok
        // -----RECUPERATION DONNÉES-----------------------------------------------------------------------------
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $mdp = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        // $mdp=$hashed_password = password_hash($mdp, PASSWORD_DEFAULT); //hash non fonctionnel TODO
        $daoUser = new DAOUser();

        // -----FIND USER-----------------------------------------------------------------------------
        $Users = $daoUser->findByMail($mail);

        foreach ($Users as $User) {
            if ($User!=NULL) {
                if($User->getMdp()==$mdp){
                    // -----SAUVEGARDE DU LOG-----------------------------------------------------------------------------
                    $daoLogs = new DAOLogs();
                    $monlog = new Logs();
                    $monlog->setIdUser($User->getId());
                    $monlog->setDate(date("Y/m/d"));
                    $monlog->setHeure(date("H:i"));
                    $daoLogs->saveLogs($monlog);

                    Session::initialiserSessionGlobale($User->getId(),$User->getMail(), $User->getMdp(),$User->getDroit());
                        
                    header('Location: /site/accueil');
                    exit();

                }else{ var_dump("mauvais MDP");}
                
            } else {
                echo "Erreur de connexion, mauvais Mail, Veuillez réessayer avec des identifiants valides svp";
                header('Location: /connexion/accueil');
                exit();
            }
        }
    }

    public function displayInscription()    { //ok
        $page = Renderer::render('connexionInscription.php');
        echo $page;
    }

    public function newInscriptionClient()    { // a tester
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $password = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        // // $mdp=$hashed_password = password_hash($password, PASSWORD_DEFAULT); TODO

        $User = new User();
        $User->setMail($mail);
        //hash mdp TODO
        $User->setMdp($password);
        $User->setDroit(1);
        
        $daoUser = new DAOUser();
        $daoUser->saveUser($User);
        $users = $daoUser->findAll();
        foreach ($users as $user) {
            if ($user->getMail() == $User->getMail() && $user->getMdp() == $User->getMdp()) {
                Session::initialiserSessionGlobale($User->getId(),$User->getMail(), $User->getMdp(), $user->getIdRole());
                header('Location: /site/accueil');
                exit();
            } else {
                echo "Erreur d'inscription, Veuillez réessayer svp";
                header('Location: /connexion/inscription');
                exit();
            }
        }
    }

    public function delConnexion()    { //a tester
        Session::detruireSession();
        header('Location: /connexion/accueil');
    }

    public function quatrecentquatre()    { //ok
        $page = Renderer::render('404.php');
        echo $page;
    }

    public function interdit()    { //ok
        $page = Renderer::render('403.php');
        echo $page;
    }
}
