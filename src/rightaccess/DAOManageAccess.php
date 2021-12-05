<?php

require_once '../src/model/singleton.php';
require_once 'ManageAccess.php';


class DAOManageAccess
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = Singleton::getInstance()->cnx;
    }

    function findByURL($url): Array
    {
        $requete = $this->cnx->prepare("SELECT * FROM MANAGEACCESS WHERE url LIKE :url");
        $requete->bindValue(':url', $url, PDO::PARAM_STR);
        $requete->execute();
        $Access = array();
            while ( $result = $requete->fetchObject('ManageAccess') ){
                $Access[] = $result; 
            };
            return $Access;
    }
}
