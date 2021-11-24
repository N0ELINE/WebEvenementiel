<?php

require_once 'Avis.php';
require_once 'singleton.php';
require_once 'AvisEvent.php';
require_once 'AvisFormation.php';


class DAOAvis
{

    //TODO !! fonction last dans avis pour avis formation
    //AVIS(idAvis, contenu, etoiles, #idUserAvis)
    // -- AVISFORMATION(#idFormationAvis, #idAvisFormation)

    private $cnx;

    public function __construct()
    {
        $this->cnx = Singleton::getInstance()->cnx;
    }

    function findAvis($id): object
    {
        $requete = $this->cnx->prepare("SELECT * FROM AVIS WHERE IdAvis=:id");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchObject('Avis');
        return $result;
    }

    

    public function findAllAvis(): array
    {
        $requete = $this->cnx->prepare("SELECT * FROM AVIS");
        $requete->execute();
        while ($result = $requete->fetchObject('Avis')) {
            $Avis[] = $result;
        };
        return $Avis;
    }

    public function findAllFormation(): array
    {
        $requete = $this->cnx->prepare("SELECT a.idAvis, a.contenu, a.etoiles, a.idUserAvis, f.idFormationAvis FROM AVIS a,AVISFORMATION f WHERE idAvis=idAvisFormation");
        $requete->execute();
        while ($result = $requete->fetchObject('Avis')) {
            $Avis[] = $result;
        };
        return $Avis;
    }

    public function findAllEvent(): array
    {
        $requete = $this->cnx->prepare("SELECT a.idAvis, a.contenu, a.etoiles, a.idUserAvis, e.idEvent FROM AVIS a,AVISEVENT e WHERE a.idAvis=e.idAvis");
        $requete->execute();
        while ($result = $requete->fetchObject('Avis')) {
            $Avis[] = $result;
        };
        return $Avis;
    }

    private function findAvisLastOne(): object
    {
        $requete = $this->cnx->prepare("SELECT * FROM AVIS ORDER BY idAvis  DESC LIMIT 1");
        $requete->execute();
        $Avis = $requete->fetchObject('Avis');
        return $Avis;
    }

    public function saveAvisEvent(Avis $Avis)
    {
        $cnx = $this->cnx;

        $contenu = $Avis->getContenu();
        $etoiles = $Avis->getEtoiles();
        $user = $Avis->getidUserAvis();
        $concerne = $Avis->getidConcerne();

        //requete sql
        $SQLS = "INSERT INTO AVIS (contenu,etoiles,idUserAvis) VALUES (:contenu,:etoiles,:user)";
        //prepare statement
        $prepareStatementSave = $cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":contenu", $contenu, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":etoiles", $etoiles, PDO::PARAM_INT);
        $prepareStatementSave->bindValue(":user", $user, PDO::PARAM_INT);
        $result=$prepareStatementSave->execute();

        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }

        $LastOneAvis=$this->findAvisLastOne();
        // foreach($LastOneAvis as $last){
        //     $idAvis=$last->getId();
        // }
        //requete sql
        $SQLS = "INSERT INTO AVISEVENT (idEvent,idAvis) VALUES (:idEvent,:idAvis)";
        //prepare statement
        $prepareStatementSave = $cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idEvent", $concerne, PDO::PARAM_INT);
        $prepareStatementSave->bindValue(":idAvis", $LastOneAvis->getId(), PDO::PARAM_INT);
        $result=$prepareStatementSave->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }
    }

  

    // public function update(Avis $Avis)
    // {

    //     $cnx = $this->cnx;

    //     $id = $Avis->getId();
    //     $Login = $Avis->getLibelle();

    //     //requete sql
    //     $SQLU = "UPDATE AVIS SET contenu=:contenu,etoiles=:etoiles WHERE idAvis=:id";

    //     //prepare statement
    //     $prepareStatementUpdate = $cnx->prepare($SQLU);
    //     $prepareStatementUpdate->bindValue(":id", $contenu, PDO::PARAM_INT);
    //     $prepareStatementUpdate->bindValue(":Libelle", $etoiles, PDO::PARAM_STR);

    //     $prepareStatementUpdate->execute();
    // }
}
