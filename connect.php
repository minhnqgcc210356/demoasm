<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct()
    {
        $this->server   ="uzb4o9e2oe257glt.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username ="gpfkkk7dv906okev";
        $this->password ="iwxzglnmvkygtllc";
        $this->dbName   ="n67aepjbzgvyqgxd";
    }

    // Option 1:mysqli
    function connectToMySQL():mysqli{
    $conn = new mysqli($this->server,
    $this->username, $this->password, $this->dbName);
    
    if($conn->connect_error){
        die("Failed ".$conn->connect_error);
    }else{
        
    }
    return $conn;
    }
    //option2 :PDO
    function connectToPDO():PDO{
        try{
            $conn = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->username,$this->password);
            
        }catch(PDOException $e){
            die("Falied " .$e);
        }
        return $conn;
    }
}
$c = new Connect();
$c->connectToPDO();
// $c->connectToMySQL();
?>