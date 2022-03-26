<?php

class connect{
    public function getPDO(){
        $dsn = "mysql:dbname=blog_space;host=localhost;port=3306;";
        $usr = "root";
        $pwd = "";
        $pdo = NEW PDO($dsn, $usr, $pwd);
        return $pdo;
    }
}

?>