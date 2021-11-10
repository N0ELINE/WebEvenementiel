<?php

require_once 'Droits.php';
require_once 'singleton.php';


class DAOUser
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = Singleton::getInstance()->cnx;
    }

    function find($id): object
    {
        $requete = $this->cnx->prepare("SELECT * FROM DROITS WHERE idDroits=:id");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchObject('Droits');
        return $result;
    }

    public function findAll(): array
    {
        $requete = $this->cnx->prepare("SELECT * FROM Droits");
        $requete->execute();
        $Droits = array();
        while ($result = $requete->fetchObject('Droits')) {
            $Droits[] = $result;
        };
        return $Droits;
    }

    public function findByLibelle(string $libelle): array
    {
        $requete = $this->cnx->prepare("SELECT * FROM Droits WHERE libelleDroit = :libelle");
        $requete->bindValue(':libelle', $libelle, PDO::PARAM_STR);
        $requete->execute();
        $Droits = array();
        while ($result = $requete->fetchObject('Droits')) {
            $Droits[] = $result;
        };
        return $Droits;
    }

    public function remove($id)
    {
        $requete = $this->cnx->prepare("DELETE FROM DROITS WHERE idDroits=:id");
        $requete->bindValue("id", $id, PDO::PARAM_INT);
        $requete->execute();
    }

    public function save(Droits $Droits)
    {

        $cnx = $this->cnx;

        $libelleDroit = $Droits->getLibelle();
        $Mdp = $Droits->getMdp();

        //requete sql
        $SQLS = "INSERT INTO DROITS (libelleDroit) VALUES (:libelleDroit)";
        //prepare statement
        $prepareStatementSave = $cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":libelleDroit", $libelleDroit, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }
}
