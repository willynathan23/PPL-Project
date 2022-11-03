<?php 
class SemesterDaoImpl
{
    public function fetchAllDosen() {
        $link = PDOUtil::createConnection();    
        $query = 'SELECT semester.*, FROM semester ORDER BY periode ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Semester');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
}
?>