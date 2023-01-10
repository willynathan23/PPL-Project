<?php

class JadwalAdminController
{
   private $jadwalDao;
   private $dosenDao;
   private $matkulDao;
   private $semesterDao;
   private $ruanganDao;

   public function __construct()
   {
      $this->jadwalDao = new JadwalDaoImpl();
      $this->dosenDao = new DosenDaoImpl();
      $this->matkulDao = new MatkulDaoImpl();
      $this->semesterDao = new SemesterDaoImpl();
      $this->ruanganDao = new RuanganDaoImpl();
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
            $jadwal = new Jadwal();
            $jadwal->setKelas($kelas);
            $jadwal->setMatkul($kode);
            $jadwal->setDosen($nik);
            $jadwal->setSemester($semester);
            $jadwal->setRuangan($ruangan);
            $jadwal->setTipe($tipe);
            $result = $this->jadwalDao->insertNewJadwal($jadwal);
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

      $dataCSV = filter_input(INPUT_POST, 'btnSubmit');
      if (isset($dataCSV)) {
         $fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
         if ($fh === false) {
            echo '<script>
                     swal({
                        title: "Input failed!",
                        text: "Failed to uploaded",
                        icon: "error",
                     });
                  </script>';
         }
         while (($col = fgetcsv($fh)) !== false) {
            try {
               var_dump($col[0]);
               $jadwal = new Jadwal();
               $jadwal->setKelas($col[0]);
               $jadwal->setMatkul($col[1]);
               $jadwal->setDosen($col[2]);
               $jadwal->setSemester($col[3]);
               $jadwal->setRuangan($col[4]);
               $jadwal->setTipe($col[5]);
               $result = $this->jadwalDao->insertNewJadwal($jadwal);
            } catch (Exception $ex) {
               echo $ex->getMessage();
            }
         }
         fclose($fh);
         echo '<script>
                  swal({
                     title: "Input Success!",
                     text: "Data Added",
                     icon: "success",
                  });
               </script>';
      }

      $doss = $this->dosenDao->fetchAllDosen();
      $matkul = $this->matkulDao->fetchAllMatkul();
      $sems = $this->semesterDao->fetchAllSemester();
      $ruang = $this->ruanganDao->fetchAllRuangan();
      include_once 'view-admin/jadwal.php';
   }
}
