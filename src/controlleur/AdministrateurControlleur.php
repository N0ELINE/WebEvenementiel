<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOLogs.php';

require_once '../src/model/User.php';
require_once '../src/model/Logs.php';

class AdministrateurControlleur {

    public function tableauDeBord() {
// -----RECUPERATION DES LOGS--------------------------------------------------------------------------
        $daolog = new DAOLogs();
        $mesLogs = $daolog->findAll(); 

        $daouser = new DAOUser();
        $Users = $daouser->findAll();
        
       
// -----AFFICHAGE PAGE-----------------------------------------------------------------------------
        $page= Renderer::render('adminTDB.php', compact('mesLogs,Users'));
        echo $page;
    }

    public function displayUser($id) {
        $daouser = new DAOUser();
        $monUser = new User();
        $monUser = $daouser->find($id);
        
        $page= Renderer::render('adminUser.php', compact('monUser'));
        echo $page;
    }

    public function creerUser() {
        $daouser=new DAOUser();
        $user=new User();
        $vide=false;
        
        $_nom = htmlspecialchars(isset($_POST['mail']) ? $_POST['mail'] : NULL);
        if ($_nom==NULL){
            $_nom="";
            $vide=true;
        }
        $user->setMail($_nom);
        
        $mdp = htmlspecialchars(isset($_POST['mdp']) ? $_POST['mdp'] : NULL);
        if ($mdp==NULL){
            $mdp="";
            $vide=true;
        }
        $user->setMdp($_nom);
    
        $role=$_POST['role'];
        //recuperer le nom du role (ou le numero direct) dans la vue TODO
        $user->setDroit((int)$role);

        if($vide==false){
            $daouser->saveUser($user);

            header('Location: /admin/users');
            exit();
        }
        else{
            echo("problème dans la création du nouvel utilisateur");
            header('Location: /admin/users');
        }
    }

    public function supprUser($id) {
        $daouser=new DAOUser();
        $true=$daouser->remove($id);
        if ($true==NULL){
            header('Location: /connexion/404');
        }else{
            
            header('Location: /admin/users');
            echo("utilisateur supprimé");
        }
        
    }

    public function modifierUser($id) {
        $daouser = new DAOUser();
        $user=new User();
        $user=$daouser->find($id);
        
        if($user==NULL){
            header('Location: /connexion/404');
        }
        
        $login = htmlspecialchars(isset($_POST['nom']) ? $_POST['nom'] : NULL);
        if ($login!=NULL){
            $user->setLogin((string)$login);
        }
        
        $mdp = htmlspecialchars(isset($_POST['mdp']) ? $_POST['mdp'] : NULL);
        if ($mdp!=NULL){
            $user->setMsp((string)$mdp);
        }
        $modifier=null;
        //todo sur la vue mettre dans $modifier la valeur de la liste deroulante séléctionnée
        if ($modifier==true){
            $role=$_POST['role'];
            $user->setIdRole((int)$role);
        }
        
        $daouser->update($user);
        header('Location: /admin/users');
        exit();
    }

}