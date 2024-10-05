<?php
class SitemapModel {
    private $__conn;
    public function __construct($conn) {
        $this->__conn = $conn;
    }
    public function getAllZones() {
        try {
            if(isset($this->__conn)){
                $sql = "Select * from zones";
                $stmt = $this->__conn->prepare($sql);
                $stmt -> execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }catch(PDOException $e){
            echo "".$e->getMessage();
        } 
    }
    public function getAllBeaches() {
        try {
            if(isset($this->__conn)){
                $sql = "Select id,name from beaches";
                $stmt = $this->__conn->prepare($sql);
                $stmt -> execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }catch(PDOException $e){
            echo "".$e->getMessage();
        } 
    }    
    }



?>