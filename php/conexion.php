<?php


class conexion
{
    private $host = 'localhost'; // 127.0.0.1
    private $user = 'root';      // no debe ser publciada en repositorios
    private $password = '1234567';  // no debe ser publciada en repositorios
    private $database = 'store';
    private $table = "sneakers";
    private $connection;

        // claconstructor
    public function __construct()
    {
        try{
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}",
                $this->user, $this->password );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO:: ERRMODE_EXCEPTION);
 //           echo "ok";
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }


    public function getConnection()
    {
        return $this->connection;
    }
    
    public function getData()
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    
}






