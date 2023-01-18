<?php

class AsistenDaoImpl
{
   public function insertNewAsisten(Jadwal $jadwal, Mahasiswa $mahasiswa, $jumlah_pertemuan, $tgl_pertemuan, $total_jam)
   {
      $result = 0;
      $link = PDOUtil::createConnection();
      $query = 'INSERT INTO asisten(pertemuan, jadwal_kelas, jadwal_matkul_kode_matkul, jadwal_dosen_nrp_dosen, jadwal_semester_periode, mahasiswa_nrp, total_jam, tgl_pertemuan) VALUES(?,?,?,?,?,?,?,?)';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $jumlah_pertemuan);
      $stmt->bindValue(2, $jadwal->getKelas());
      $stmt->bindValue(3, $jadwal->getMatkul()->getKodeM());
      $stmt->bindValue(4, $jadwal->getDosen()->getNrp());
      $stmt->bindValue(5, $jadwal->getSemester()->getPeriode());
      $stmt->bindValue(6, $mahasiswa->getNrp());
      $stmt->bindValue(7, $total_jam);
      $stmt->bindValue(8, $tgl_pertemuan);
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


   public function fetchAsistenFromPertemuan($pertemuan, $kelas, $kode, $nrpdosen, $semester)
   {
      $link = PDOUtil::createConnection();
      $query = 'SELECT asisten.*, mahasiswa.nrp as nrpmahasiswa, mahasiswa.nama_mhs FROM asisten INNER JOIN mahasiswa ON asisten.mahasiswa_nrp = mahasiswa.nrp WHERE pertemuan = ? AND jadwal_kelas = ? AND jadwal_matkul_kode_matkul = ? AND jadwal_dosen_nrp_dosen = ? AND jadwal_semester_periode = ?';
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $pertemuan);
      $stmt->bindValue(2, $kelas);
      $stmt->bindValue(3, $kode);
      $stmt->bindValue(4, $nrpdosen);
      $stmt->bindValue(5, $semester);

      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Asisten');
      $stmt->execute();
      $link = null;
      return $stmt->fetchAll();
   }
}
