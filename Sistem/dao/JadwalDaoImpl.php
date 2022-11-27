<?php
class JadwalDaoImpl
{
    public function fetchAllJadwal($nrp)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.kelas, jadwal.tipe, jadwal.Matkul_kode_matkul as "kodematkul", 
        jadwal.Ruangan_kode_ruangan as "koderuangan", jadwal.Dosen_nrp_dosen as "nrpdosen", 
        jadwal.Semester_periode as "periodesems",
        matkul.nama_matkul, semester.jumlah_semester, ruangan.nama_ruangan FROM jadwal 
        INNER JOIN matkul ON jadwal.matkul_kode_matkul=matkul.kode_matkul 
        INNER JOIN semester ON jadwal.semester_periode=semester.periode
        INNER JOIN ruangan ON jadwal.ruangan_kode_ruangan=ruangan.kode_ruangan
        INNER JOIN dosen ON jadwal.dosen_nrp_dosen=dosen.nrp
        WHERE jadwal.dosen_nrp_dosen = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $nrp);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchJadwal($kelas, $kode_matkul, $nrp_dosen, $semester, $tipe)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.* FROM jadwal WHERE kelas = ? AND matkul_kode_matkul = ? AND dosen_nrp_dosen = ? AND semester_periode = ? AND tipe = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kelas);
        $stmt->bindParam(2, $kode_matkul);
        $stmt->bindParam(3, $nrp_dosen);
        $stmt->bindParam(4, $semester);
        $stmt->bindParam(5, $tipe);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Jadwal');
    }

    public function fetchRuanganFromJadwal($kelas, $kode_matkul, $nrp_dosen, $semester, $tipe)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT jadwal.ruangan_kode_ruangan as koderuangan FROM jadwal WHERE kelas = ? AND matkul_kode_matkul = ? AND dosen_nrp_dosen = ? AND semester_periode = ? AND tipe = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kelas);
        $stmt->bindParam(2, $kode_matkul);
        $stmt->bindParam(3, $nrp_dosen);
        $stmt->bindParam(4, $semester);
        $stmt->bindParam(5, $tipe);
        $stmt->execute();
        $link = null;
        return $stmt->fetch();
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
