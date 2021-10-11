bonjour

<?php

/**
 * Description of index / routeur
 *
 * @author Nöeline
 */

    $path = trim($_SERVER["PATH_INFO"], "/");
    
    require_once '../src/Controler/ConnexionController.php';
    require_once '../src/Controler/AccueilControlleur.php';
    
    if (isset($_SERVER["PATH_INFO"])) {
    } else {
        $path = "";
    }
    
    $fragments = explode("/", $path);
    
      session_start();

      $control = array_shift($fragments);
      switch ($control) {
      case "site" : {
        accueilroutes($fragments);
        break;
      }
      case "connexion" : {
          connexionroutes($fragments);
          break;
      }
        
      case "blog" : {
          blogroutes($fragments);
          break;
      }
      case "espaceclient" : {
          if($_SESSION["role"]->getNom()=='client'){
            var_dump($_SESSION["role"]->getNom());
            clientroutes($fragments);
            }
            else {
              header('Location: /connexion/interdit');
            }
            break;
      }
        case "formation" : {
         if($_SESSION["role"]->getNom()=='client'){
             var_dump($_SESSION["role"]->getNom());
             
          formationroutes($fragments);
         }
         else {
             header('Location: /connexion/interdit');
             }
          break;
      }
      case "evenement" : {
          eventsroute($fragments);
          break;
    }
      case "collaborateur" : {
       if($_SESSION["role"]->getNom()=='collaborateur'){
           var_dump($_SESSION["role"]->getNom());
           collabroutes($fragments);
        }
        else {
          header('Location: /connexion/interdit');
        }
        break;
      }
      case "admin" : {
          if($_SESSION["role"]->getNom()=='admin'){
            var_dump($_SESSION["role"]->getNom());
            adminroutes($fragments);
          }
          else {
             header('Location: /connexion/interdit');
          }
          break;
      }  
      case "opinon" : {
        if($_SESSION["role"]->getNom()=='client'){
          var_dump($_SESSION["role"]->getNom());
          avisroutes($fragments);
        }
        else {
           header('Location: /connexion/interdit');
        }
        break;
    }   
    case "notif" : {
      
      if($_SESSION["role"]->getNom()=='client'){
        var_dump($_SESSION["role"]->getNom());
        notifroutes($fragments);
      }
      else {
         header('Location: /connexion/interdit');
      }
      break;
  }     
        default : {
          header('Location: /connexion/404');
          break;
        }
    }
    

    function accueilroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "accueil" : {
                  call_user_func_array(["AccueilController", "display"], $fragments);
                  break;
          }
          case "contact":{
            call_user_func_array(["AccueilController","displayPageContact"], $fragments);
            break;
          }
          case "sendContact":{
            call_user_func_array(["AccueilController","envoiContact"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }
    
    function connexionroutes($fragments) {
        $action = array_shift($fragments);

        switch ($action) {
            case "accueil" : {
                    call_user_func_array(["ConnexionController", "display"], $fragments);
                    break;
            }
            case "inscription":{
                call_user_func_array(["ConnexionController","displayinscription"], $fragments);
                break;
            }
            case "connexion":{
              call_user_func_array(["ConnexionController","newconnexion"], $fragments);
              break;
            }
            case "sinscrire":{
              call_user_func_array(["ConnexionController","newinscription"], $fragments);
              break;
            }
            case "sedeconnecter" : {
                    call_user_func_array(["ConnexionController","delconnexion"], $fragments);
                    break;
            }
            case "hellouser" : {
                    call_user_func_array(["ConnexionController","helloUser"], $fragments);
                    break;
            }    
            
            case "404":{
                call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
                break;
            }
            case "permissiondenided":{
              call_user_func_array(["ConnexionController","interdit"], $fragments);
              break;
            }
            default :{
              header('Location: /connexion/404');
              break;
            }
        }  
    }

    function blogroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "all" : {
                  call_user_func_array(["BlogController", "displayArticles"], $fragments);
                  break;
          }
          case "one":{
              call_user_func_array(["BlogController","displayArticle"], $fragments);
              break;
          }
          case "like":{
            call_user_func_array(["BlogController","aimerArticle"], $fragments);
            break;
          }
          case "comment":{
            call_user_func_array(["BlogController","commenter"], $fragments);
            break;
          }
          case "share":{
            call_user_func_array(["BlogController","partagereseaux"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }

    function clientroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "accueil" : {
            call_user_func_array(["ClientController", "displayclient"], $fragments);
            break;
          }
          case "myevents":{
            call_user_func_array(["ClientController","displayevenements"], $fragments);
            break;
          }
          case "eventgalery":{
            call_user_func_array(["ClientController","galerie"], $fragments);
            break;
          }
          
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }

    function formationroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "all" : {
                  call_user_func_array(["FormationController", "displayformations"], $fragments);
                  break;
          }
          case "one":{
              call_user_func_array(["FormationController","displayformation"], $fragments);
              break;
          }
          case "myformations":{
            call_user_func_array(["FormationController","mesformations"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }

    function ateliersroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "all" : {
                  call_user_func_array(["AteliersController", "displayateliers"], $fragments);
                  break;
          }
          case "one":{
              call_user_func_array(["AteliersController","displayatelier"], $fragments);
              break;
          }
          case "subscribe":{
            call_user_func_array(["AteliersController","sinscrireatelier"], $fragments);
            break;
          }
          case "unsubscribe":{
            call_user_func_array(["AteliersController","desinscrireatelier"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }


    function collabroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "board" : {
                  call_user_func_array(["CollaborateurController", "tableaudebord"], $fragments);
                  break;
          }
          case "allarticles":{
              call_user_func_array(["CollaborateurController","articles"], $fragments);
              break;
          }
          case "addarticle":{
            call_user_func_array(["CollaborateurController","creerarticle"], $fragments);
            break;
          }
          case "modifarticle":{
            call_user_func_array(["CollaborateurController","ecrirearticle"], $fragments);
            break;
          }
          case "events":{
            call_user_func_array(["CollaborateurController","afficherevements"], $fragments);
            break;
          }
          case "addevent":{
            call_user_func_array(["CollaborateurController","ajouterevenement"], $fragments);
            break;
          }
          case "modifyevent":{
            call_user_func_array(["CollaborateurController","afficherevenement"], $fragments);
            break;
          }
          case "downloadpicture":{
            call_user_func_array(["CollaborateurController","importphoto"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }

    function adminroutes($fragments) {
      $action = array_shift($fragments);

      switch ($action) {
          case "board" : {
                  call_user_func_array(["AdministrateurController", "tableaudebord"], $fragments);
                  break;
          }
          case "users":{
              call_user_func_array(["AdministrateurController","displayusers"], $fragments);
              break;
          }
          case "user":{
            call_user_func_array(["AdministrateurController","displayuser"], $fragments);
            break;
        }
          case "adduser":{
            call_user_func_array(["AdministrateurController","creeruser"], $fragments);
            break;
          }
          case "deluser":{
            call_user_func_array(["AdministrateurController","suppruser"], $fragments);
            break;
          }
          case "modifyuser":{
            call_user_func_array(["AdministrateurController","modifieruser"], $fragments);
            break;
          }
          case "logs":{
            call_user_func_array(["AdministrateurController","afficherlogs"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }

    function opinionroutes($fragments) {
      $action = array_shift($fragments);

        switch ($action) {
          case "all":{
            call_user_func_array(["AccueilController","displayAvis"], $fragments);
            break;
        }
          case "atelier":{
            call_user_func_array(["AvisControlleur","ajouteravisatelier"], $fragments);
            break;
          }
          case "formation":{
            call_user_func_array(["AvisControlleur","ajouteravisformation"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }

    function notifroutes($fragments) {
      $action = array_shift($fragments);

        switch ($action) {
          case "all":{
            call_user_func_array(["NotifControlleur","mesnotifs"], $fragments);
            break;
        }
          case "lu":{
            call_user_func_array(["NotifControlleur","read"], $fragments);
            break;
          }
          case "allnotifs":{
            call_user_func_array(["NotifControlleur","touteslesnotifs"], $fragments);
            break;
          }
          case "newnotif":{
            call_user_func_array(["NotifControlleur","creernotif"], $fragments);
            break;
          }
          default :{
            header('Location: /connexion/404');
            break;
          }
      }  
    }


    