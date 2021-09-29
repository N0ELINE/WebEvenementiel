<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

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
        $password = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        $mdp=$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $daoUser = new DAOUser();
        
        $User = new User();
        $User = $daoUser->findByMail($mail);

        foreach ($User as $key => $user) {
            $Usermail = $user->getMail();
            $Usermdp = $user->getMdp();
            $Userid = $user->getId();
            $Userrole = $user->getIdRole();

            if ($mail == $Usermail && $Usermdp == $mdp) {         
                $daorole = new DAODroit();
                $role=$daodroit->find($Userrole);
                Session::initialiserSessionGlobale($Userid, $Usermail,$Userrole); //ajouter $roles dans les parenthèses
                header('Location: /accueil/hello');
                exit();
            } else {
                echo "Erreur de connexion";
                header('Location: /connexion/accueil');
                exit();
            }
        }
    }

    public function newInscriptionClient() {
        $mail = htmlspecialchars(isset($_POST["email"]) ? $_POST["email"] : NULL);
        $password = htmlspecialchars(isset($_POST["password"]) ? $_POST["password"] : NULL);
        $mdp=$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $daoUser = new DAOUser();
        $daodroit = new DAODroit();
        
        $User = new User();
        $User->setMail($mail);
        $User->setMdp($mdp);
        $droit=$daodroit->findByLibelle("client");
        $User->setDroit($droit);

        foreach ($User as $key => $user) {
            $Usermail = $user->getMail();
            $Usermdp = $user->getMdp();
            $Userid = $user->getId();
            $Userrole = $user->getIdRole();

            if ($mail == $Usermail && $Usermdp == $mdp) {         
                
                $role=$daodroit->find($Userrole);
                Session::initialiserSessionGlobale($Userid, $Usermail,$Userrole);
                header('Location: /accueil/hello');
                exit();
            } else {
                echo "Erreur d'inscription";
                header('Location: /connexion/accueil');
                exit();
            }
        }
    }

    public function delconnexion() {
        session_start();
        Session::detruireSession();
        header('Location: /connexion/accueil');
    }

    public function helloUser() {
        $page = Renderer::render('vousetesconnecte.php');
        echo $page;
    }

    public function quatrecentquatre() {
        $page = Renderer::render('page404.php');
        echo $page;
    }

    public function interdit() {
        $page = Renderer::render('accessdenied.php');
        echo $page;
    }
    
    
}
