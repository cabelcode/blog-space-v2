<?php
class checkRequest{
    private $adr, $ag, $ur;
    public function set(){
        $this->adr = $_SERVER['REMOTE_ADDR'];
        $this->ag = $_SERVER['HTTP_USER_AGENT'];
        $this->ur = $_SERVER['REQUEST_URI'];

        $connect = new connect;
        $pdo = $connect->getPDO();
        

        $queryGet = "select count(*) as req_count from logrequest where time BETWEEN DATE_SUB(NOW(), INTERVAL 1440 MINUTE) AND NOW()";
        $stmtGet = $pdo->prepare($queryGet);
        $stmtGet->execute();
        $row = $stmtGet->fetch(PDO::FETCH_ASSOC);

        if( $row['req_count'] > 150 ){
            return false;
        }  

        $query = "insert into logrequest( `address`, `agent`, `uri` ) values ( :adr, :ag, :ur )";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":adr", $this->adr);
        $stmt->bindParam(":ag", $this->ag);
        $stmt->bindParam(":ur", $this->ur);
        $stmt->execute();
        return true;
    }
}

?>