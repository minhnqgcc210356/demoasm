<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct()
    {
        $this->server   ="grp6m5lz95d9exiz.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username ="vmwqu9xpurcnxzbk";
        $this->password ="risyy6crerxwv0ru";
        $this->dbName   ="qsz3edm1udtv0gfu";
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