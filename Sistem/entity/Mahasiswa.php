<?php

class Mahasiswa
{
   private $nrp;
   private $nama_mhs;

   public function getNrp()
   {
      return $this->nrp;
   }

   public function setNrp($nrp)
   {
      $this->nrp = $nrp;
   }

   public function getNamaMahasiswa()
   {
      return $this->nama_mhs;
   }

   public function setNamaMahasiswa($nama_mhs)
   {
      $this->nama_mhs = $nama_mhs;
   }
}
