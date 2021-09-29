<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class ClientController {
    public function tableaudebord() {

    }

    public function displayusers() {
        $daouser = new DAOUser();    
        $users=$daouser->findAll();
        $page= Renderer::render('adminUsers.php', compact('users'));
        echo $page;
    }

    public function displayuser() {
        $daouser = new DAOUser();
        $monUser = new User();
        $monUser = $daouser->find($id);
        
        $page= Renderer::render('adminUser.php', compact('monUser'));
        echo $page;
    }

    public function creeruser() {
        $daouser=new DAOUser();
        $user=new User();
        $vide=false;
        
        $_nom = htmlspecialchars(isset($_POST['nom']) ? $_POST['nom'] : NULL);
        if ($_nom==NULL){
            $_nom="";
            $vide=true;
        }
        $user->setLogin($_nom);
        
        $mdp = htmlspecialchars(isset($_POST['mdp']) ? $_POST['mdp'] : NULL);
        if ($mdp==NULL){
            $mdp="";
            $vide=true;
        }
        $user->setMdp($_nom);
    
        $role=$_POST['role'];
        //recuperer le nom du role (ou le numero direct) dans la vue TODO
        $user->setIdRole((int)$role);

        if($vide==false){
            $daouser->save($user);

            header('Location: /admin/users');
            exit();
        }
        else{
            echo("problème dans la création du nouvel utilisateur");
            header('Location: /admin/users');
        }
    }

    public function suppruser() {

    }

    public function modifieruser() {
        $daoinscrit = new DAOInscrit();
        $inscrit=new Inscrit();
        $inscrit=$daoinscrit->find($id);
        
        $login = htmlspecialchars(isset($_POST['nom']) ? $_POST['nom'] : NULL);
        if ($login!=NULL){
            $inscrit->setLogin((string)$login);
        }
        
        $mdp = htmlspecialchars(isset($_POST['mdp']) ? $_POST['mdp'] : NULL);
        if ($mdp!=NULL){
            $inscrit->setMsp((string)$mdp);
        }
        
        $modifier=null;
        //todo mettre dans $modifier la valeur du bouton
        if ($modifier==true){
            $role=$_POST['role'];
            $inscrit->setIdRole((int)$role);
        }
        
        $daoinscrit->update($inscrit);
        header('Location: /admin/users');
        exit();
    }

    public function afficherlogs() {
        $daologs = new DAOLogs();    
        $logs=$daologs->findAll();
        $page= Renderer::render('adminLogs.php', compact('logs'));
        echo $page;
    }

}