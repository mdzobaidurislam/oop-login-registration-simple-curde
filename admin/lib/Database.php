<?php

class Databese{
	private $host="localhost";
	private $dbuser="root";
	private $dbpass="";
	private $dbname="oop";
	public $pdo;
    public function __construct(){
    	if (!isset($this->pdo)) {
    		try {
    			$link=new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
    			$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    			//$link->exec("SET CHARACTER SET UTF-8");
    			$this->pdo=$link; 
    		} catch (PDOException $e) {
    			die("Failed to connet with database.".$e->getMessage());
    		}
    	}
    }
}