<?php
class JadwalDaoImpl
{
    public function fetchAllJadwal()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.*, FROM jadwal';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchJadwal($kelas)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.* FROM product WHERE kelas = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kelas);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Jadwal');
    }

    public function insertNewJadwal(Jadwal $jadwal)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO jadwal(Dosen_nrp-dosen, Matkul_kode-ruangan, kelas, tipe, Ruangan_kode-ruangan, Semester_periode) VALUES(?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwal->getDosen()->getNrp());
        $stmt->bindValue(2, $jadwal->getMatkul()->getKode());
        $stmt->bindValue(3, $jadwal->getKelas());
        $stmt->bindValue(4, $jadwal->getTipe());
        $stmt->bindValue(5, $jadwal->getRuangan()->getKode());
        $stmt->bindValue(6, $jadwal->getSemester()->getPeriode());
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
