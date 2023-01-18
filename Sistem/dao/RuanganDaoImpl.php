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


    public function fetchRuangan($kode)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM ruangan WHERE kode_ruangan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kode);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Ruangan');
    }

    public function insertNewRuangan(Ruangan $ruangan)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO ruangan(kode_ruangan, nama_ruangan) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $ruangan->getKodeR());
        $stmt->bindValue(2, $ruangan->getNamaR());
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

    public function updateRuangan(Ruangan $ruangan)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'UPDATE ruangan SET nama_ruangan = ? WHERE kode_ruangan = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $ruangan->getNamaR());
        $stmt->bindValue(2, $ruangan->getKodeR());
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


    public function deleteRuangan($kode)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'DELETE FROM ruangan WHERE kode_ruangan = ?';
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
