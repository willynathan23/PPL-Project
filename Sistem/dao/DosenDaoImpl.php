<?php 
class DosenDaoImpl
{
    public function fetchAllDosen() {
        $link = PDOUtil::createConnection();    
        $query = 'SELECT dosen.*, FROM dosen ORDER BY nrp-dosen ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Dosen');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
}
?>