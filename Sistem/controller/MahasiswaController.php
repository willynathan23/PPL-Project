<?php

class MahasiswaController
{
   private $mahasiswaDao;

   public function __construct()
   {
      $this->mahasiswaDao = new MahasiswaDaoImpl();
   }

   public function index()
   {

      $deleteCommand = filter_input(INPUT_GET, 'delcom');
      if (isset($deleteCommand) && $deleteCommand == 1) {
         $mahasiswaId = filter_input(INPUT_GET, 'mid');
         $result = $this->mahasiswaDao->deleteMahasiswa($mahasiswaId);

         if ($result) {
            echo '<script>
                    swal({
                        title: "Good job!",
                        text: "Delete Data Success",
                        icon: "success",
                      });
                      </script>';
         } else {
            echo '<script>
            swal({
                title: "Input failed!",
                text: "Error on delete data!",
                icon: "error",
              });

              </script>';
         }
      }
      $mahasiswa = $this->mahasiswaDao->fetchAllMahasiswa();



      include_once 'view-admin/mahasiswa.php';
   }

   public function upindex()
   {

      $mid = filter_input(INPUT_GET, 'mid');

      if (isset($mid)) {

         $mahasiswa = $this->mahasiswaDao->fetchMahasiswaFromNRP($mid);
      }

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $nrp = filter_input(INPUT_POST, 'nrp');
         $nama = filter_input(INPUT_POST, 'nama');

         if (empty($nrp) || empty($nama)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                  </script>';
         } else {
            $newMahasiswa = new Mahasiswa();
            $newMahasiswa->setNrp($nrp);
            $newMahasiswa->setNamaMahasiswa($nama);

            $result = $this->mahasiswaDao->updateMahasiswa($newMahasiswa);

            if ($result) {
               echo '<script>
                 window.location = "index.php?ahref=mahasiswa";
                 </script>';
            } else {
               echo '<script>
               swal({
                   title: "Input failed!",
                   text: "Error on update data!",
                   icon: "error",
                 });

                 </script>';
            }
         }
      }


      include_once 'view-admin/mahasiswa-update.php';
   }
}
