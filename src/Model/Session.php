<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    
    static function initialiserSessionGlobale($id,$login){
        self::ajouter("id", $id);
        self::ajouter('mail', $mail);
        // self::ajouter("roles", $roles); //ajouter $roles en attribut de la fonction
    }
    
    static function initialiserLaboratoire(){
        self::ajouter("panier", []);
    }
    
}
