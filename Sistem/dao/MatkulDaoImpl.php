<?php
class MatkulDaoImpl
{
    public function fetchAllMatkul()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT matkul.* FROM matkul ORDER BY kode_matkul ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Matkul');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }


    public function fetchMatkul($kode)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM matkul WHERE kode_matkul = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kode);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Matkul');
    }

    public function updateMatkul(Matkul $matkul)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'UPDATE matkul SET nama_matkul = ? WHERE kode_matkul = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $matkul->getNamaM());
        $stmt->bindValue(2, $matkul->getKodeM());
        $link->beginTransaction();

        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        $link = null;
        return $result;
    }

    public function insertNewMatkul(Matkul $matkul)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO matkul(kode_matkul, nama_matkul) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $matkul->getKodeM());
        $stmt->bindValue(2, $matkul->getNamaM());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function deleteMatkul($kode)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'DELETE FROM matkul WHERE kode_matkul = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kode);
        $link->beginTransaction();

        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        $link = null;
        return $result;
    }
}
