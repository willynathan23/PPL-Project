<?php

class JadwalAdminController
{
   private $jadwalDao;

   public function __construct()
   {
      $this->jadwalDao = new JadwalDaoImpl();
   }

   public function index()
   {
      $jadwal = $this->jadwalDao->fetchAllJadwal2();

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $nik = filter_input(INPUT_POST, 'nik');
         $kode = filter_input(INPUT_POST, 'kode');
         $semester = filter_input(INPUT_POST, 'semester');
         $ruangan = filter_input(INPUT_POST, 'ruangan');
         $kelas = filter_input(INPUT_POST, 'kelas');
         $tipe = filter_input(INPUT_POST, 'tipe');
         if (empty($nik) || empty($kode) || empty($semester) || empty($ruangan) || empty($kelas) || empty($tipe)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                </script>';
         } else {

            $result = $this->jadwalDao->insertNewJadwal($kelas, $kode, $nik, $semester, $ruangan, $tipe);

            if ($result) {
               echo '<script>
               swal({
                   title: "Good job!",
                   text: "Add Data Success",
                   icon: "success",
                 });
                 </script>';
            } else {
               echo '<script>
               swal({
                   title: "Input failed!",
                   text: "Error on add data!",
                   icon: "error",
                 });
                 </script>';
            }
         }
      }

      include_once 'view-admin/jadwal.php';
   }
}
