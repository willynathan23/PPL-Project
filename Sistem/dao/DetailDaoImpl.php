<?php
class DetailDaoImpl
{
    public function fetchAllDetail()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT detail_jadwal.*, jadwal.matkul_kode_matkul as "kodematkul", jadwal.dosen_nrp_dosen as "nrpdosen", jadwal.semester_periode as "periodesems", jadwal.kelas as "kelas", jadwal.tipe as "tipe", dosen.nama as "namadosen" FROM detail_jadwal
        INNER JOIN jadwal ON detail_jadwal.jadwal_kelas = jadwal.kelas 
        AND detail_jadwal.jadwal_matkul_kode_matkul = jadwal.matkul_kode_matkul
        AND detail_jadwal.jadwal_dosen_nrp_dosen = jadwal.dosen_nrp_dosen
        AND detail_jadwal.jadwal_semester_periode = jadwal.semester_periode 
        AND detail_jadwal.jadwal_ruangan_kode_ruangan = jadwal.ruangan_kode_ruangan 
        INNER JOIN dosen ON jadwal.dosen_nrp_dosen = dosen.nrp';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DetailJadwal');
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

    public function insertNewDetail(Jadwal $jadwal, $jumlah_pertemuan, $tgl_pertemuan, $waktu_mulai, $waktu_selesai, $materi, $gambar = null)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO detail_jadwal(jumlah_pertemuan, jadwal_kelas, jadwal_matkul_kode_matkul, jadwal_dosen_nrp_dosen, jadwal_semester_periode, jadwal_ruangan_kode_ruangan, tgl_pertemuan, waktu_mulai, waktu_selesai, materi, gambar) VALUES(?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jumlah_pertemuan);
        $stmt->bindValue(2, $jadwal->getKelas());
        $stmt->bindValue(3, $jadwal->getMatkul()->getKodeM());
        $stmt->bindValue(4, $jadwal->getDosen()->getNrp());
        $stmt->bindValue(5, $jadwal->getSemester()->getPeriode());
        $stmt->bindValue(6, $jadwal->getRuangan()->getKodeR());
        $stmt->bindValue(7, $tgl_pertemuan);
        $stmt->bindValue(8, $waktu_mulai);
        $stmt->bindValue(9, $waktu_selesai);
        $stmt->bindValue(10, $materi);
        $stmt->bindValue(11, $gambar);
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

    public function fetchAllDetailForDosen($kelas, $kode, $nrpdosen, $semester, $ruangan)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT detail_jadwal.*, jadwal.kelas as 'kelas', jadwal.matkul_kode_matkul as 'kodematkul', jadwal.dosen_nrp_dosen as 'nrpdosen', jadwal.semester_periode 'periodesems', jadwal.tipe FROM detail_jadwal 
        INNER JOIN jadwal ON detail_jadwal.jadwal_kelas = jadwal.kelas 
        AND detail_jadwal.jadwal_matkul_kode_matkul = jadwal.matkul_kode_matkul 
        AND detail_jadwal.jadwal_dosen_nrp_dosen = jadwal.dosen_nrp_dosen 
        AND detail_jadwal.jadwal_semester_periode = jadwal.semester_periode 
        AND detail_jadwal.jadwal_ruangan_kode_ruangan = jadwal.ruangan_kode_ruangan 
        WHERE detail_jadwal.jadwal_kelas = ? 
        AND detail_jadwal.jadwal_matkul_kode_matkul = ? 
        AND detail_jadwal.jadwal_dosen_nrp_dosen = ? 
        AND detail_jadwal.jadwal_semester_periode = ? 
        AND detail_jadwal.jadwal_ruangan_kode_ruangan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kelas);
        $stmt->bindParam(2, $kode);
        $stmt->bindParam(3, $nrpdosen);
        $stmt->bindParam(4, $semester);
        $stmt->bindParam(5, $ruangan);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'DetailJadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }
}
