<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blogZZ";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    function database($sql,$connection,$fetch){
        $sql;
        $statement = $connection->prepare($sql);
        $statement->execute();
    
        $statement->setFetchMode(PDO::FETCH_ASSOC);
    
        
        return $statement->$fetch();
    }
?>
