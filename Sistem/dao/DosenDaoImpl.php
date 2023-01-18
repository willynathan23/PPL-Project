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

    public function fetchDosen($nrp)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM dosen WHERE nrp = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $nrp);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Dosen');
    }

    public function dosenLogin($nrp, $password)
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

    public function updatePasswordDosen(Dosen $dosen)
    {
        $result = 0;
        $link = PDOUtil::createConnection();


        $query = 'UPDATE dosen SET password = ? WHERE nrp = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $dosen->getPassword());
        $stmt->bindValue(2, $dosen->getNrp());

        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        return $result;
    }


    public function insertNewDosen(Dosen $dosen)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO dosen(nrp, nama, password) VALUES(?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $dosen->getNrp());
        $stmt->bindValue(2, $dosen->getNama());
        $stmt->bindValue(3, $dosen->getPassword());
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

    public function updateDosen(Dosen $dosen)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'UPDATE dosen SET nama = ? WHERE nrp = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $dosen->getNama());
        $stmt->bindValue(2, $dosen->getNrp());
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

    public function deleteDosen($nrp)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'DELETE FROM dosen WHERE nrp = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $nrp);
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
