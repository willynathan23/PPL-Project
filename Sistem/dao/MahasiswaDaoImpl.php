<?php

class MahasiswaDaoImpl
{
   public function fetchMahasiswa($nama)
   {
      $link = PDOUtil::createConnection();
      $query = "SELECT * FROM mahasiswa WHERE nama_mhs LIKE '%$nama%'";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;
      return $stmt->fetchObject('Mahasiswa');
   }

   public function fetchAllMahasiswa()
   {
      $link = PDOUtil::createConnection();
      $query = 'SELECT * FROM mahasiswa';
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Mahasiswa');
      $stmt->execute();
      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchMahasiswaFromNRP($nrp)
   {
      $link = PDOUtil::createConnection();
      $query = "SELECT * FROM mahasiswa WHERE nrp = ?";

      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $nrp);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;
      return $stmt->fetchObject('Mahasiswa');
   }


   public function insertNewMahasiswa(Mahasiswa $mahasiswa)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO mahasiswa(nrp, nama_mhs) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $mahasiswa->getNrp());
        $stmt->bindValue(2, $mahasiswa->getNamaMahasiswa());
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

   public function updateMahasiswa(Mahasiswa $mahasiswa)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'UPDATE mahasiswa SET nama_mhs = ? WHERE nrp = ?';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $mahasiswa->getNamaMahasiswa());
      $stmt->bindValue(2, $mahasiswa->getNrp());
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


   public function deleteMahasiswa($nrp)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = 'DELETE FROM mahasiswa WHERE nrp = ?';
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
