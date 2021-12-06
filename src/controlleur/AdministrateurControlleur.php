<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOLogs.php';

require_once '../src/model/Logs.php';

class AdministrateurControlleur {

    public function tableauDeBord() { //ok
// -----RECUPERATION DES LOGS--------------------------------------------------------------------------
        $daolog = new DAOLogs();
        $mesLogs = $daolog->findAll(); 
        
                
// -----AFFICHAGE PAGE-----------------------------------------------------------------------------
        $page= Renderer::render('adminTDB.php', compact('mesLogs','Users'));
        echo $page;
    }
}