<?php
require_once 'Database.php';

class UsersDB {
    private $db;
    private $tablename;
    private $tableid;

    public function __construct() {
        $this->db = new Database();
        $this->tablename = 'medicament';
        $this->tableid = 'medicament_id';
    }

    public function create($price, $quantite){
        $sql="insert into $this->tablename set price=?, quantite=?";
        $params= array ($price, $quantite);
        $this->db->prepare($sql, $params);
    }

    public function update($price, $quantite){
        $sql="update  $this->tablename set price=?, quantite=? where $this->tableid=?";
        $params= array ($price, $quantite, $id);
        $this->db->prepare($sql, $params);
    }

    public function delete($id){
        $sql="delete from $this->tablename where $this->tableid=?";
        $params= array ($id);
        $this->db->prepare($sql, $params);
    }

    public function read($id){
        $sql="select * from $this->tablename where $this->tableid=?";
        $params= array ($id);
        $this->db->prepare($sql, $params);
        return $this->db->getDatas($req, true);
    }

    public function readAll(){
        $sql="select * from $this->tablename order by $this->tableid=?";
        $params= null;
        $this->db->prepare($sql, $params);
        return $this->db->getDatas($sql, false);
    }
}
?>