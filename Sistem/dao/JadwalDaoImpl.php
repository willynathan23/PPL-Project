<?php
class JadwalDaoImpl
{
    public function fetchAllJadwal()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.kelas, jadwal.tipe, jadwal.Matkul_kode_matkul as "kodematkul", 
        jadwal.Ruangan_kode_ruangan as "koderuangan", jadwal.Dosen_nrp_dosen as "nrpdosen", 
        jadwal.Semester_periode as "periodesems",
        matkul.nama_matkul, semester.jumlah_semester, ruangan.nama_ruangan FROM jadwal 
        INNER JOIN matkul ON jadwal.Matkul_kode_matkul=matkul.kode_matkul 
        INNER JOIN semester ON jadwal.Semester_periode=semester.periode
        INNER JOIN ruangan ON jadwal.Ruangan_kode_ruangan=ruangan.kode_ruangan';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchJadwal($kelas)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.* FROM product WHERE kelas = ?'; //query
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
        $query = 'INSERT INTO jadwal(Dosen_nrp_dosen, Matkul_kode_matkul, kelas, tipe, Ruangan_kode_ruangan, Semester_periode) VALUES(?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwal->getDosen()->getNrp());
        $stmt->bindValue(2, $jadwal->getMatkul()->getKodeM());
        $stmt->bindValue(3, $jadwal->getKelas());
        $stmt->bindValue(4, $jadwal->getTipe());
        $stmt->bindValue(5, $jadwal->getRuangan()->getKodeR());
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
