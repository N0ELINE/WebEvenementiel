<?php

/**
 * Description of index / routeur
 *
 * @author Nöeline
 * athenais
 */

$path = trim($_SERVER["PATH_INFO"], "/");

require_once("../src/controlleur/AccueilControlleur.php");
require_once("../src/controlleur/AdministrateurControlleur.php");
require_once("../src/controlleur/AvisControlleur.php");
require_once("../src/controlleur/BlogControlleur.php");
require_once("../src/controlleur/ConnexionController.php");
require_once("../src/controlleur/EvenementControlleur.php");
require_once("../src/controlleur/FormationControlleur.php");
require_once("../src/controlleur/NotificationControlleur.php");


if (isset($_SERVER["PATH_INFO"])) {
} else {
  $path = "";
}

$fragments = explode("/", $path);

session_start();

$control = array_shift($fragments);
switch ($control) {

  case "site": {
      accueilroutes($fragments);
      break;
    }
  case "admin": {
      //   var_dump($_SESSION["role"]->getNom());
      // if($_SESSION["role"]->getNom()=='admin'){
      adminroutes($fragments);
      // }else { header('Location: /connexion/interdit'); }
      break;
    }
  case "avis": {
      opinionroutes($fragments);
      break;
    }
  case "blog": {
      blogroutes($fragments);
      break;
    }
  case "connexion": {
      connexionroutes($fragments);
      break;
    }
  case "evenement": {
      evenementroutes($fragments);
      break;
    }
  case "formation": {
      formationroutes($fragments);
      break;
    }
  case "notif": { //doit etre connecté pour avoir des notifs
      notifroutes($fragments);
      break;
    }
  default: {
      header('Location: /connexion/404');
      break;
    }
}



function accueilroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "accueil": {
        call_user_func_array(["AccueilController", "display"], $fragments);
        break;
      }
    case "contact": {
        call_user_func_array(["AccueilController", "displayPageContact"], $fragments);
        break;
      }
    case "sendContact": {
        call_user_func_array(["AccueilController", "envoiContact"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function adminroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "board": {
        call_user_func_array(["AdministrateurController", "tableauDeBord"], $fragments);
        break;
      }
    case "users": {
        call_user_func_array(["AdministrateurController", "displayUsers"], $fragments);
        break;
      }
    case "user": {
        call_user_func_array(["AdministrateurController", "displayUser"], $fragments);
        break;
      }
    case "adduser": {
        call_user_func_array(["AdministrateurController", "creerUser"], $fragments);
        break;
      }
    case "deluser": {
        call_user_func_array(["AdministrateurController", "supprUser"], $fragments);
        break;
      }
    case "modifyuser": {
        call_user_func_array(["AdministrateurController", "modifierUser"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function opinionroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "all": {
        call_user_func_array(["AvisControlleur", "displayAvis"], $fragments);
        break;
      }
    case "atelier": {
        call_user_func_array(["AvisControlleur", "ajouterAvisAtelier"], $fragments);
        break;
      }
    case "formation": {
        call_user_func_array(["AvisControlleur", "ajouterAvisFormation"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function blogroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
      //fonction générales
    case "all": {
        call_user_func_array(["BlogController", "displayArticles"], $fragments);
        break;
      }
    case "one": {
        call_user_func_array(["BlogController", "displayArticle"], $fragments);
        break;
      }
      //fonctions clients connectés
    case "like": {
        call_user_func_array(["BlogController", "aimerArticle"], $fragments);
        break;
      }
    case "comment": {
        call_user_func_array(["BlogController", "commenter"], $fragments);
        break;
      }
    case "share": {
        call_user_func_array(["BlogController", "partagereseaux"], $fragments);
        break;
      }
      //fonctions collaborateur
    case "new": {
        call_user_func_array(["BlogController", "creerarticleCollaborateur"], $fragments);
        break;
      }
    case "edition": {
        call_user_func_array(["BlogController", "editionArticleCollaborateur"], $fragments);
        break;
      }
    case "addpicture": {
        call_user_func_array(["BlogController", "importPhotoArticleCollaborateur"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function connexionroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "accueil": {
        call_user_func_array(["ConnexionController", "display"], $fragments);
        break;
      }
    case "inscription": {
        call_user_func_array(["ConnexionController", "displayInscription"], $fragments);
        break;
      }
    case "connexion": {
        call_user_func_array(["ConnexionController", "newConnexion"], $fragments);
        break;
      }
    case "sinscrire": {
        call_user_func_array(["ConnexionController", "newInscriptionClient"], $fragments);
        break;
      }
    case "sedeconnecter": {
        call_user_func_array(["ConnexionController", "delConnexion"], $fragments);
        break;
      }
      // case "hellouser": {
      //     call_user_func_array(["ConnexionController", "helloUser"], $fragments);
      //     break;
      //   }
    case "404": {
        call_user_func_array(["ConnexionController", "quatrecentquatre"], $fragments);
        break;
      }
    case "403": {
        call_user_func_array(["ConnexionController", "interdit"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function evenementroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
      //fonctions générales
    case "all": {
        call_user_func_array(["EvenementControlleur", "displayEvenements"], $fragments);
        break;
      }
    case "one": {
        call_user_func_array(["EvenementControlleur", "displayEvenement"], $fragments);
        break;
      }
      //fonctions clients connectés
    case "subscribe": {
        call_user_func_array(["EvenementControlleur", "sinscrireEvent"], $fragments);
        break;
      }
    case "unsubscribe": {
        call_user_func_array(["EvenementControlleur", "desinscrireEvent"], $fragments);
        break;
      }
    case "mine": {
        call_user_func_array(["EvenementControlleur", "displaymesevenement"], $fragments);
        break;
      }
      //fonctions collaborateurs
    case "new": {
        call_user_func_array(["EvenementControlleur", "ajouterEvenementCollaborateur"], $fragments);
        break;
      }
    case "galerieAdd": {
        call_user_func_array(["EvenementControlleur", "galerieEvenementAddCollaborateur"], $fragments);
        break;
      }
    case "edition": {
        call_user_func_array(["EvenementControlleur", "editionEvenementCollaborateur"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function formationroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "all": {
        call_user_func_array(["FormationControlleur", "displayformations"], $fragments);
        // call_user_func_array(["FormationControlleur", "displayformations"], $fragments);
        break;
      }
    case "quizz": {
        call_user_func_array(["FormationControlleur", "displayformation"], $fragments);
        break;
      }
    case "myformations": {
        call_user_func_array(["FormationControlleur", "mesformations"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}

function notifroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "all": {
        call_user_func_array(["NotifControlleur", "mesnotifs"], $fragments);
        break;
      }
    case "lu": {
        call_user_func_array(["NotifControlleur", "read"], $fragments);
        break;
      }
    case "allnotifs": {
        call_user_func_array(["NotifControlleur", "touteslesnotifs"], $fragments);
        break;
      }
    case "newnotif": {
        call_user_func_array(["NotifControlleur", "creernotif"], $fragments);
        break;
      }
    default: {
        header('Location: /connexion/404');
        break;
      }
  }
}
