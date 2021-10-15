<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOLogs.php';
require_once '../src/model/Session.php';

require_once '../src/model/User.php';
require_once '../src/model/Logs.php';

class ConnexionController {

    public function display() {
        $page = Renderer::render('connexion.php');
        echo $page;
    }

    public function displayInscription() {
        $page = Renderer::render('inscription.php');
        echo $page;
    }

    public function newconnexion() {
        
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $mdp = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        // $mdp=$hashed_password = password_hash($mdp, PASSWORD_DEFAULT); //hash non fonctionnel TODO
        $daoUser = new DAOUser();
        
        $User = $daoUser->findByIdMail($mail);
        var_dump($User);

            // if (!empty($User) && $User->getMdp() == $mdp) {
        //         // Save le log TODO BDD
        //         // $daoLogs = new DAOLogs();
        //         // $log = new Logs();
        //         // $log->setIdUser($Userid);
        //         // $log->setDate(date("Y/m/d"));
        //         // $log->setHeure(date("H:i"));
        //         // $daoLogs->saveLogs($Log);

        //         //Session TODO
        //         // Session::initialiserSessionGlobale($User->getMail(), $User->getMdp(),$User->getDroit()); //ajouter $roles dans les parenthèses
                
        //         header('Location: /site/accueil');
        //         exit();
        //     } else {
        //         echo "Erreur de connexion, Veuillez réessayer avec des identifiants valides svp";
        //         header('Location: /connexion/accueil');
        //         exit();
            // }
            exit();
    }

    public function newInscriptionClient() {
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $password = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        // $mdp=$hashed_password = password_hash($password, PASSWORD_DEFAULT); TODO

        $User = new User();
        $User->setMail($mail);
        //hash mdp TODO
        $User->setMdp($mdp);
        $User->setDroit(1);
        
        $daoUser = new DAOUser();
        $users =$daoUser->findAll();
        foreach ($users as $key => $user) {
            if ($user->getMail() == $User->getMail() && $user->setMdp($mdp) == $User->setMdp($mdp)) {         
                Session::initialiserSessionGlobale($User->getMail(), $User->getMdp(),$user->getIdRole());
                header('Location: /site/accueil');
                exit();
            } else {
                echo "Erreur d'inscription, Veuillez réessayer svp";
                header('Location: /connexion/accueil');
                exit();
            }
        }
    }

    public function delconnexion() {
        Session::detruireSession();
        header('Location: /connexion/accueil');
    }

    // public function helloUser() {
    //     $page = Renderer::render('vousetesconnecte.php');
    //     echo $page;
    // }

    public function quatrecentquatre() {
        $page = Renderer::render('404.php');
        echo $page;
    }

    public function interdit() {
        $page = Renderer::render('403.php');
        echo $page;
    }
    
    
}
