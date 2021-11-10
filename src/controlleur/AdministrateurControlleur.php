<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';
require_once '../src/model/DAOLogs.php';

require_once '../src/model/User.php';
require_once '../src/model/Logs.php';

include("class/pData.class.php");
include("class/pDraw.class.php");
include("class/pImage.class.php");
include("class/pPie.class.php");
include("class/pIndicator.class.php");

class AdministrateurControlleur {

    public function tableauDeBord() {
// -----RECUPERATION DES LOGS--------------------------------------------------------------------------
        $daolog = new DAOLogs();
        $mesLogs = $daolog->findAll(); 

// -----TRAITEMENT DES DONNÉES POUR GRAPHIQUE----------------------------------------------------------
//         $dataArray;  
//         for($i = 9; $i <= 12; $i++){    
//             foreach ($mesLogs as $monLog){
//                 list($month, $day, $year) = split('[-.-]', $monLog->getDate());
//                 if($i == $year){
//                     $dataArrayy[i-9]+=1;
//                 }
//             }
//         }
       
// // -----CREATION GRAPHIQUE-----------------------------------------------------------------------------
//         $MyData = new pData(); //objet contenant les datas du graphique

//         $MyData->addPoints(array($dataArray),"Data"); //série de données à grapher
//         $MyData->setSerieWeight("Data",2);
//         $MyData->setAxisName(0,"Nombre connexions");//nom axe vertical
        
//         $MyData->addPoints(array("09","10","11","12"),"year");//mois 
//         $MyData->setSerieDescription("year","Années");
//         $MyData->setAbscissa("year");
//         $MyData->setPalette("Data",array("R"=>255,"G"=>0,"B"=>0));
        
//         $myPicture = new pImage(900,330,$MyData);//création de l'image
//         $myPicture->drawRectangle(0,0,899,329,array("R"=>0,"G"=>0,"B"=>0));
        
//         // $myPicture->setFontProperties(array("FontName"=>"fonts/pf_arma_five.ttf","FontSize"=>6)); //fond du graphique
//         // $myPicture->setGraphArea(60,40,800,310);
//         $scaleSettings = array("XMargin"=>10,"YMargin"=>10,"Floating"=>TRUE,"GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
//         $myPicture->drawScale($scaleSettings);
        
//         $myPicture->drawAreaChart(); //création du graphique
//         $myPicture->drawLineChart(); 
//         $myPicture->drawPlotChart(array("DisplayValues"=>TRUE,"PlotBorder"=>TRUE,"BorderSize"=>2,"Surrounding"=>-60,"BorderAlpha"=>80));
//         $myPicture->Render("../../public_html/image/PanelAdmin.png"); //chemin de l'image

// -----AFFICHAGE PAGE-----------------------------------------------------------------------------
        $page= Renderer::render('adminTDB.php', compact('mesLogs'));
        echo $page;
    }

    public function displayUsers() {
        $daouser = new DAOUser();    
        $users=$daouser->findAll();
        $page= Renderer::render('adminUsers.php', compact('users'));
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