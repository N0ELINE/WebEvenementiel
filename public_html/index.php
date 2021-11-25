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
require_once("../src/controlleur/RightAccessContolleur.php");



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
    call_user_func_array(["AdministrateurControlleur", "tableauDeBord"], $fragments);
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

function opinionroutes($fragments)
{
  $action = array_shift($fragments);

  switch ($action) {
    case "add": {
        call_user_func_array(["AvisControlleur", "ajouterAvisEvent"], $fragments);
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
        call_user_func_array(["BlogControlleur", "displayArticles"], $fragments);
        break;
      }
    case "one": {
        call_user_func_array(["BlogControlleur", "displayArticle"], $fragments);
        break;
      }
      //fonctions clients connectés
    case "like": {
        call_user_func_array(["BlogControlleur", "aimerArticle"], $fragments);
        break;
      }
      case "favori": {
        call_user_func_array(["BlogControlleur", "articleAime"], $fragments);
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
    case "mine": {
        call_user_func_array(["EvenementControlleur", "displaymesevenement"], $fragments);
        break;
      }
      //fonctions collaborateurs
    case "new": {
        call_user_func_array(["EvenementControlleur", "ajouterEvenementCollaborateur"], $fragments);
        break;
      }
    case "edition": {
        call_user_func_array(["EvenementControlleur", "editionEvenementCollaborateur"], $fragments);
        break;
      }
      case "save": {
        call_user_func_array(["EvenementControlleur", "saveEventModify"], $fragments);
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
