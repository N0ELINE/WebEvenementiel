<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../src/model/User.php';

class Session {    

    static function existe($nomSession){
        return isset($_SESSION[$nomSession])?true:false;
    }
    
    static function ajouter($nomSession,$valeur){
        $_SESSION[$nomSession]=$valeur;
    }
    
    static function detruireSession(){
        session_unset();
        session_destroy();
    }
    
    static function detruireValeur($nomSession){
        if(self::existe($nomSession)){
            unset($_SESSION[$nomSession]);
        }
    }
    
    static function initialiserSessionGlobale($id,$mail,$role){
        self::ajouter("id", $id);
        self::ajouter("mail", $mail);
        self::ajouter("role", $role); 
    }


    
    
}
