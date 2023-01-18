<?php

class AsistenController
{
   private $asistenDao;

   public function __construct()
   {
      $this->asistenDao = new AsistenDaoImpl();
   }

   public function index()
   {
      $kode = filter_input(INPUT_GET, 'kode');
      $kelas = filter_input(INPUT_GET, 'kelas');
      $semester = filter_input(INPUT_GET, 'semester');
      $nrpdosen = filter_input(INPUT_GET, 'nrpdosen');
      $pertemuan = filter_input(INPUT_GET, 'pertemuan');

      if (isset($kode) && isset($kelas) && isset($semester) && isset($nrpdosen) && isset($pertemuan)) {
         $asistens = $this->asistenDao->fetchAsistenFromPertemuan($pertemuan, $kelas, $kode, $nrpdosen, $semester);
      } else {
         header('location:index.php?ahref=home');
      }

      include_once 'view/asisten.php';
   }
}
