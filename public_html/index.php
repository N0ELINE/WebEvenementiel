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

require_once("../src/rightaccess/ManageAccess.php");
require_once("../src/rightaccess/DAOManageAccess.php");



if (isset($_SERVER["PATH_INFO"])) {
} else {
  $path = "";
}
session_start();
$fragments = explode("/", $path);



$dao = new DAOManageAccess();
$mesAcces = $dao->findByURL($fragments[0] . "/" . $fragments[1]);
$flag = 403;
if (sizeof($mesAcces) != 0) {
  switch ($mesAcces[0]->getDroit()) {
    case 1: {
        $flag = 1;
        break;
      }
    case 2: {
        if ($_SESSION["role"] == 2) {
          $flag = 1;
        }
        break;
      }
    case 3: {
        if ($_SESSION["role"] == 3 || $_SESSION["role"] == 4) {
          $flag = 1;
        }
        break;
      }
    case 4: {
        if ($_SESSION["role"] == 4) {
          $flag = 1;
        }
        break;
      }
    case 5: {
        if ($_SESSION["role"] == 3 || $_SESSION["role"] == 2 || $_SESSION["role"] == 4) {
          $flag = 1;
        }
        break;
      }
    default: {
        $flag = 404;
        break;
      }
  }
} else {
  $flag == 404;
}

array_shift($fragments);
array_shift($fragments);


switch ($flag) {
  case 403: {
      header('Location: /connexion/403');
      break;
    }
  case 1: {
      call_user_func_array([$mesAcces[0]->getControleur(), $mesAcces[0]->getFonction()], $fragments);
      break;
    }
  default: {
      header('Location: /connexion/404');
      break;
    }
}
