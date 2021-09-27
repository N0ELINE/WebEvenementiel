<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

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

        $daoUser = new DAOUser();
        
        $User = new User();
        $User = $daoUser->findByMail($mail);

        foreach ($User as $key => $user) {
            $Usermail = $user->getMail();
            $Usermdp = $user->getMdp();
            $Userid = $user->getId();
            // $Userrole = $user->getIdRole();

            if ($mail == $Usermail && $Usermdp == $mdp) {         
                // $daorole = new DAORole();
                // $role=$daorole->find($Userrole);
                Session::initialiserSessionGlobale($Userid, $Usermail); //ajouter $roles dans les parenthèses
                header('Location: /accueil/hello');
                exit();
            } else {
                echo "Erreur de connexion";
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
    
    
}
