<?php
class DetailDaoImpl
{
    public function fetchAllDetail()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT detail_jadwal.jumlah_pertemuan, detail_jadwal.waktu_pertemuan, 
        detail_jadwal.waktu_mulai, detail_jadwal.waktu_selesai, detail_jadwal.Jadwal_kelas as kelas,
        detail_jadwal.Jadwal_tipe, detail_jadwal.Jadwal_Matkul_kode_matkul as "kodematkul",
        detail_jadwal.Jadwal_Dosen_nrp_dosen as "nrpdosen", detail_jadwal.Jadwal_Semester_periode as "periodesems" FROM detail_jadwal
        INNER JOIN jadwal ON detail_jadwal.Jadwal_kelas=jadwal.kelas 
        AND detail_jadwal.Jadwal_tipe=jadwal.tipe
        AND detail_jadwal.Jadwal_Matkul_kode_matkul=jadwal.Matkul_kode_matkul
        AND detail_jadwal.Jadwal_Dosen_nrp_dosen=jadwal.Dosen_nrp_dosen 
        AND detail_jadwal.Jadwal_Semester_periode=jadwal.Semester_periode';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Detail');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchDetail($jumlahP)
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT detail_jadwal.* FROM detail_jadwal WHERE jumlah_pertemuan = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $jumlahP);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Detail');
    }

    public function insertNewDetail(Jadwal $jadwal, $jumlah_pertemuan, $tgl_pertemuan, $waktu_mulai, $waktu_selesai)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO detail_jadwal(jumlah_pertemuan, jadwal_kelas, jadwal_matkul_kode_matkul, jadwal_dosen, jadwal_semester_periode, jadwal_ruangan_kode_ruangan, tgl_pertemuan, waktu_mulai, waktu_selesai) VALUES(?,?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jumlah_pertemuan);
        $stmt->bindValue(2, $jadwal->getDosen()->getNrp());
        $stmt->bindValue(3, $jadwal->getMatkul()->getKodeM());
        $stmt->bindValue(4, $jadwal->getKelas());
        $stmt->bindValue(5, $jadwal->getTipe());
        $stmt->bindValue(6, $jadwal->getRuangan()->getKodeR());
        $stmt->bindValue(7, $jadwal->getSemester()->getPeriode());
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
