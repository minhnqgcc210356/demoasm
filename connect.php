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
        $this->password ="pnzdlr6jytnwz5n3";
        $this->dbName   ="n67aepjbzgvyqgxd";
    }

    // Option 1:mysqli
    function connectToMySQL():mysqli{
    $conn = new mysqli("mysql://gpfkkk7dv906okev:pnzdlr6jytnwz5n3@uzb4o9e2oe257glt.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/n67aepjbzgvyqgxd");
    
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
?>