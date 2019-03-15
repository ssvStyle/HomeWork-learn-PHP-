<?php

include_once __DIR__ . '/../../config.php';
/**
 * Description of DB
 *
 * @author ssv
 */
class DB
{
    protected $dbPdo;
    
    public function __construct()
    {
        $this->dbPdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    }
    
    public function execute(string $sql)
    {
        $obj = $this->dbPdo->prepare($sql);
        $obj->execute();
        if($obj->errorCode() === '00000'){
            return true;
        }
        return false;
    }
    
    public function query(string $sql, array $data)
    {
        
        $dbPdoStatement = $this->dbPdo->prepare($sql);
        $dbPdoStatement->execute($data);
            
            if ($dbPdoStatement->errorCode() !== '00000'){
                return false;
            }
            
        return $dbPdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
}
