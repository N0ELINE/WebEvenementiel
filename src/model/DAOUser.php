<?php

require_once 'User.php';
require_once 'singleton.php';

 
Class DAOUser {//
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx; 
    }    
    
    // function find($id) : object {
    //         $requete = $this->cnx -> prepare("SELECT * FROM USER WHERE idUser = :id");
    //         $requete -> bindValue(':id', $id, PDO::PARAM_INT);
    //         $j = $requete -> execute();
    //         // if ($j === false) {
    //         //     var_dump($requete->errorInfo());
    //         // }
    //         $result = $requete->fetchObject('User'); 

    //         return $result;
    // }

    function findByMail($mail) : Array {
        $requete = $this->cnx -> prepare("SELECT * FROM USER WHERE Mail LIKE :mail");
        $requete -> bindValue(':mail', $mail, PDO::PARAM_STR);
        $requete -> execute();
        $Users = array();
            while ( $result = $requete->fetchObject('User') ){
                $Users[] = $result; 
            };
        return $Users;  
    }
    
    // public function findAll() :Array {
    //         $requete = $this->cnx -> prepare("SELECT * FROM USER");
    //         $requete -> execute();
    //         $Users = array();
    //         while ( $result = $requete->fetchObject('User') ){
    //             $Users[] = $result; 
    //         };
    //         return $Users;       
    // }
    
    public function saveUser(User $User){
       
        $cnx=$this->cnx;
       
        $Mail=$User->getMail();
        $Mdp=$User->getMdp();
        $Droit=$User->getDroit();
        
        //requete sql
        $SQLS="INSERT INTO USER (Mail,hashMdp,droit) VALUES (:Mail,:Mdp,:droit)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":Mail",$Mail, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":Mdp",$Mdp, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":droit",$Droit, PDO::PARAM_STR);

        $result=$prepareStatementSave->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }
    }

    public function findUserLastOne(){
        $requete = $this->cnx->prepare("SELECT * FROM USER ORDER BY idUser  DESC LIMIT 1");
        $requete->execute();
        while ($result = $requete->fetchObject('User')) {
            $User[] = $result;
        };
        return $User;
    }
    
}
