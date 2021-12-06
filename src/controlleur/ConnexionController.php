<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOLogs.php';
require_once '../src/model/Session.php';

require_once '../src/model/User.php';
require_once '../src/model/Logs.php';

class ConnexionController
{

    public function display()
    { //ok 
        $page = Renderer::render('connexion.php');
        echo $page;
    }


    public function newConnexion()
    { //OK
        // -----RECUPERATION DONNÉES-----------------------------------------------------------------------------
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $mdp = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        $mdp = md5($mdp);

        $daoUser = new DAOUser();
        // -----FIND USER-----------------------------------------------------------------------------
        $Users = $daoUser->findByMail($mail);
        if (sizeof($Users) != 0) {
            foreach ($Users as $User) {
                if ($User != NULL) {
                    if ($User->getMdp() == $mdp) {
                        // -----SAUVEGARDE DU LOG-----------------------------------------------------------------------------
                        $daoLogs = new DAOLogs();
                        $monlog = new Logs();
                        $monlog->setIdUser($User->getId());
                        $monlog->setDate(date("Y/m/d"));
                        $monlog->setHeure(date("H:i"));
                        $daoLogs->saveLogs($monlog);
                        Session::initialiserSessionGlobale($User->getId(), $User->getMail(), $User->getDroit());
                        header('Location: /site/accueil');
                        exit();
                    } else {
                        var_dump("mauvais MDP");
                    }
                }
            }
        } else {
            echo "Erreur de connexion, mauvais Mail, Veuillez réessayer avec des identifiants valides svp";
            header('Location: /connexion/accueil');
            exit();
        }
    }

    public function displayInscription()
    { //ok
        $page = Renderer::render('connexionInscription.php');
        echo $page;
    }

    public function newInscriptionClient()
    { // ok
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $password = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        $password = md5($password);

        $User = new User();
        $User->setMail($mail);
        $User->setMdp($password);
        $User->setDroit(2);

        $daoUser = new DAOUser();
        $daoUser->saveUser($User);
        $user = $daoUser->findUserLastOne()[0];
        $flag = false;
        if ($user->getMail() == $User->getMail() && $user->getMdp() == $User->getMdp()) {
            $daoLogs = new DAOLogs();
            $monlog = new Logs();
            $monlog->setIdUser($user->getId());
            $monlog->setDate(date("Y/m/d"));
            $monlog->setHeure(date("H:i"));
            $daoLogs->saveLogs($monlog);
            Session::initialiserSessionGlobale($user->getId(), $user->getMail(), $user->getMdp(), $user->getDroit());
            header('Location: /site/accueil');
            exit();
        } else {
            echo "Erreur d'inscription, Veuillez réessayer svp";
            header('Location: /connexion/inscription');
            exit();
        }
    }

    public function delConnexion()
    { //ok
        Session::detruireSession();
        header('Location: /connexion/accueil');
    }

    public function quatrecentquatre()
    { //ok
        $page = Renderer::render('404.php');
        echo $page;
    }

    public function interdit()
    { //ok
        $page = Renderer::render('403.php');
        echo $page;
    }
}
