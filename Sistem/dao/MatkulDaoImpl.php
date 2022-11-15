<?php 
class MatkulDaoImpl
{
    public function fetchAllMatkul() {
        $link = PDOUtil::createConnection();    
        $query = 'SELECT matkul.* FROM matkul ORDER BY kode_matkul ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Matkul');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
}
?>