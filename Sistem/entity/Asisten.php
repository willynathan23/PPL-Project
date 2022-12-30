<?php

class Asisten
{
   private $pertemuan;
   private $total_jam;
   private $tgl_pertemuan;

   private $jadwal;
   private $mahasiswa;

   public function getPertemuan()
   {
      return $this->pertemuan;
   }

   public function setPertemuan($pertemuan)
   {
      $this->pertemuan = $pertemuan;
   }

   public function getTotalJam()
   {
      return $this->total_jam;
   }

   public function setTotalJam($total_jam)
   {
      $this->total_jam = $total_jam;
   }

   public function getTglPertemuan()
   {
      return $this->tgl_pertemuan;
   }

   public function setTglPertemuan($tgl_pertemuan)
   {
      $this->tgl_pertemuan = $tgl_pertemuan;
   }

   public function getJadwal()
   {
      return $this->jadwal;
   }

   public function setJadwal($jadwal)
   {
      if (!isset($this->jadwal)) {
         $this->jadwal = new Jadwal();
      }
      $this->jadwal = $jadwal;
   }

   public function getMahasiswa()
   {
      return $this->mahasiswa;
   }

   public function setMahasiswa($mahasiswa)
   {
      if (!isset($this->mahasiswa)) {
         $this->mahasiswa = new Mahasiswa();
      }
      $this->mahasiswa = $mahasiswa;
   }


   public function __set($nama, $value)
   {
      if (!isset($this->jadwal)) {
         $this->jadwal = new Jadwal();
      }

      if (!isset($this->mahasiswa)) {
         $this->mahasiswa = new Mahasiswa();
      }

      switch ($nama) {
         case 'kodematkul':
            $this->jadwal->getMatkul()->setKodeM($value);
            break;
         case 'nama_matkul':
            $this->jadwal->getMatkul()->setNamaM($value);
            break;
         case 'kelas':
            $this->jadwal->setKelas($value);
            break;
         case 'nrpdosen':
            $this->jadwal->getDosen()->setNrp($value);
            break;
         case 'periodesems':
            $this->jadwal->getSemester()->setPeriode($value);
            break;
         case 'tipe':
            $this->jadwal->setTipe($value);
            break;
         case 'nrpmahasiswa':
            $this->mahasiswa->setNrp($value);
            break;
         case 'nama_mhs':
            $this->mahasiswa->setNamaMahasiswa($value);
            break;
      }
   }
}
