<?php


/**
 * Description of index / routeur
 *
 * @author Nöeline
 */

        $path = trim($_SERVER["PATH_INFO"], "/");
    
    //require_once '../src/controller/AdministrateurController.php';
    
    
    if (isset($_SERVER["PATH_INFO"])) {
    } else {
        $path = "";
    }
    
    $fragments = explode("/", $path);
    
    $control = array_shift($fragments);
    switch ($control) {
        
        case "accueil" : {
            session_start();
//            if($_SESSION["role"]->getNom()=='laborantin'){
//                var_dump($_SESSION["role"]->getNom());
               
            accueilroutes($fragments);
//            }
//            else {
//                header('Location: /connexion/404');
//                }
            break;
            }
        case "collaborateur" : {
             session_start();

//            if($_SESSION["role"]->getNom()=='fabricant'){
                collabroutes($fragments);
//            }
//            else {
//                header('Location: /connexion/404');
//                }
            break;
            }
        case "blog" : {
              session_start();
//            if($_SESSION["role"]->getNom()=='administrateur'){
                blogroutes($fragments);
//            }
//            else {
//                header('Location: /connexion/404');
//                }
            break;
        }
        case "espaceclient" : {
          session_start();
//            if($_SESSION["role"]->getNom()=='administrateur'){
            clientroutes($fragments);
//            }
//            else {
//                header('Location: /connexion/404');
//                }
        break;
    }
        case "formation" : {
            session_start();

            formationroutes($fragments);
            break;
        }
        case "formation" : {
          session_start();

          connexionroutes($fragments);
          break;
      }
        default : {
            echo "erreur";
            break;
        }
    }
    
    
    function connexionroutes($fragments) {
        $action = array_shift($fragments);

        switch ($action) {
            case "accueil" : {
                
                    call_user_func_array(["ConnexionController", "display"], $fragments);
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
            case "connexion":{
                call_user_func_array(["ConnexionController","newconnexion"], $fragments);
                break;
            }
            case "inscription":{
              call_user_func_array(["ConnexionController","displayinscription"], $fragments);
              break;
          }
            case "404":{
                call_user_func_array(["ConnexionController","quatrecentquatre"], $fragments);
                break;
            }
            default :{
                    echo "Action '$action' non defini <hr>";
                    echo "erreur";
                    break;
                }
        }  
    }
    
    // function laboroutes($fragments) {
    //     $action = array_shift($fragments);

    //     switch ($action) {
    //         case "accueil" : {
    //             call_user_func_array(["LaboratoireController", "display"], $fragments);
    //             break;
    //             }
    //         case "anciennescommandes":{
    //             call_user_func_array(["LaboratoireController","old"], $fragments);
    //             break;
    //         }
            
    //         //fonctions pour le panier
    //         case "panier" : {
    //             call_user_func_array(["LaboratoireController","displaypanier"], $fragments);
    //             break;
    //         }    
    //         case "ajouter" : {
    //             //ajouter un item du panier
    //             call_user_func_array(["LaboratoireController","add"], $fragments);
    //             break;
    //         } 
    //         case "supprimertout" : {
    //             //supprimer un item du panier
    //             call_user_func_array(["LaboratoireController","delall"], $fragments);
    //             break;
    //         }
    //         case "supprimerun" : {
    //             //supprimer un item du panier
    //             call_user_func_array(["LaboratoireController","delone"], $fragments);
    //             break;
    //         }
    //         case "commander":{
    //             call_user_func_array(["LaboratoireController","save"], $fragments);
    //             break;
    //         }
    //         case "modifier":{
    //             call_user_func_array(["LaboratoireController","modify"], $fragments);
    //             break;
    //         }
    //         //fin fonctions panier
            
    //         default :{
    //                 echo "Action '$action' non defini <hr>";
    //                 echo "erreur";
    //                 break;
    //             }
    //     }  
    // }
    
    
    // function fabroutes($fragments) {
    //     $action = array_shift($fragments);

    //     switch ($action) {
    //         case "accueil" : {
    //             call_user_func_array(["FabriquantController", "display"], $fragments);
    //             break;
    //         }
    //         case "modifier" : {
    //             call_user_func_array(["FabriquantController", "updateshow"], $fragments);
    //             break;
    //         }
    //         case "enregistrementmodifier" : {
    //             call_user_func_array(["FabriquantController", "saveupdate"], $fragments);
    //             break;
    //         }
    //         case "nouveau" : {
    //             call_user_func_array(["FabriquantController", "newshow"], $fragments);
    //             break;
    //         }
    //         case "enregistrementnouveau" : {
    //             call_user_func_array(["FabriquantController", "savenew"], $fragments);
    //             break;
    //         }
    //         case "supprimer" : {
    //             call_user_func_array(["FabriquantController", "delete"], $fragments);
    //             break;
    //         }
    //         case "commandesrecues" : {
    //             call_user_func_array(["FabriquantController", "commande"], $fragments);
    //             break;
    //         }
    //         case "accepter" : {
    //             call_user_func_array(["FabriquantController", "yes"], $fragments);
    //             break;
    //         }
    //         case "refuser" : {
    //             call_user_func_array(["FabriquantController", "no"], $fragments);
    //             break;
    //         }
    //         default :{
    //                 echo "Action '$action' non defini <hr>";
    //                 echo "erreur";
    //                 break;
    //             }
    //     }  
     //}
    
    
    // function adminroutes($fragments) {

    //     $action = array_shift($fragments);

    //     switch ($action) {
    //         case "accueil" : {
    //             call_user_func_array(["AdministrateurController", "display"], $fragments);
    //             break;
    //         }
    //         case "modifier" : {
    //             call_user_func_array(["AdministrateurController", "modify"], $fragments);
    //             break;
    //         }
    //         case "enregistrermodifier" : {
    //             call_user_func_array(["AdministrateurController", "saveupdate"], $fragments);
    //             break;
    //         }
    //         case "nouveau" : {
    //             call_user_func_array(["AdministrateurController", "new"], $fragments);
    //             break;
    //         }
    //         case "enregistrernouveau" : {
    //             call_user_func_array(["AdministrateurController", "savenew"], $fragments);
    //             break;
    //         }
    //         case "supprimer" : {
    //             call_user_func_array(["AdministrateurController", "delete"], $fragments);
    //             break;
    //         }
    //         default :{
    //                 echo "Action '$action' non defini <hr>";
    //                 echo "erreur";
    //                 break;
    //             }
    //     } 
      
    //   }