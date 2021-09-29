bonjour

<?php

/**
 * Description of index / routeur
 *
 * @author Nöeline
 */

    $path = trim($_SERVER["PATH_INFO"], "/");
    
    require_once '../src/controller/ConnexionController.php';
    
    
    if (isset($_SERVER["PATH_INFO"])) {
    } else {
        $path = "";
    }
    
    $fragments = explode("/", $path);
    
    $control = array_shift($fragments);
    switch ($control) {
      case "accueil" : {
        session_start();
        accueilroutes($fragments);
        break;
      }
        case "connexion" : {
          session_start();
          connexionroutes($fragments);
          break;
        }
        
        case "blog" : {
          session_start();
          blogroutes($fragments);
          break;
        }
        case "espaceclient" : {
          session_start();
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
          session_start();
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
          session_start();
          eventsroute($fragments);
          break;
    }
      case "collaborateur" : {
        session_start();
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
          session_start();
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
        session_start();
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
      session_start();
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
          case "hello" : {
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
              call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
          case "notifs":{
              call_user_func_array(["NotificationController","mesnotifs"], $fragments);
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
          case "articles":{
              call_user_func_array(["CollaborateurController","articles"], $fragments);
              break;
          }
          case "addarticle":{
            call_user_func_array(["CollaborateurController","creerarticle"], $fragments);
            break;
          }
          case "writearticle":{
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
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
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
            break;
          }
      }  
    }

    function notifroutes($fragments) {
      $action = array_shift($fragments);

        switch ($action) {
          case "all":{
            call_user_func_array(["NotifControlleur","displayAvis"], $fragments);
            break;
        }
          case "lu":{
            call_user_func_array(["NotifControlleur","ajouteravisatelier"], $fragments);
            break;
          }
          case "newnotif":{
            call_user_func_array(["NotifControlleur","ajouteravisformation"], $fragments);
            break;
          }
          default :{
            call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
            break;
          }
      }  
    }


    