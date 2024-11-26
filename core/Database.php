<?php
class Database
{
    public $connection;
    public $statment;
    public function __construct($config,$username="root",$password="")
    {
        try {
            $dsn = "mysql:" . http_build_query($config,'',';');
           
            $this->connection = new PDO($dsn, $username, $password,[
                PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_ASSOC  
            ]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function Query($query,$params=[])
    {
        $this->statment =  $this->connection->prepare($query);
       $this->statment->execute($params);
        return $this;
    }
    public function find(){
        return $this->statment->fetch();

    }
    public function findorfail(){
       $result= $this->find();
        if(!$result){
            port();
        }
        return $result;
    }
    public function get(){
      return  $this->statment->fetchAll();
    }
}
