<?php 
class RuanganDaoImpl
{
    public function fetchAllRuangan() {
        $link = PDOUtil::createConnection();    
        $query = 'SELECT ruangan.* FROM ruangan ORDER BY kode_ruangan ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Ruangan');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
}
?>