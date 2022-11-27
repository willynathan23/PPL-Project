<?php
class DosenDaoImpl
{
    public function fetchAllDosen()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT dosen.* FROM dosen ORDER BY nrp ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Dosen');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    function dosenLogin($nrp, $password)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT * FROM dosen WHERE nrp = ? AND password = ?';

        $stmt = $link->prepare($query);

        $stmt->bindParam(1, $nrp);
        $stmt->bindParam(2, $password);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;

        return $stmt->fetchObject('Dosen');
    }
}
