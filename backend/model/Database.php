<?php
class Database{
    private $dsn;
    private $username;
    private $password;
    private $pdo;
    public function __construct() {
        $this->dsn= 'my sql:host=localhost;dbname=pharmatrixdb;port=3306;charset=utf8';
        $this->username='root';
        $this->password='';
    }

    // creation de la chaine de connection

    public function getConnect(){
        if($this->pdo === null){
            try{
                $this->pdo= new PDO($this->dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTION);      //permet d'afficher l'erreur 
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);   //considere chaque ligne comme un objet
            }
            catch(Exception $ex) {
                die('Echec de connection :' . $ex->getMessage());
            }    
        }
        return $this->pdo;
    }

    // definit le mode de recuperation
    public function prepare($sql, $params=null) {
        $req= $this->getConnect()->prepare($sql);
        if(is_null($params)){
            $req->execute();
        }
        else{
            $req->execute($parems);
        }
        return $req;
    }
// recuperer les information
    public function getData($req, $one=true) {
        if($one == true){
            $datas= $req->fetch();
        }
        else{
            $datas= $req->fetchAll(); 
        }
        return $datas;
    }
}
?>