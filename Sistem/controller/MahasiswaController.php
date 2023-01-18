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
      $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
      if (isset($submitPressed)) {
         $nrp = filter_input(INPUT_POST, 'txtNRP');
         $namaM = filter_input(INPUT_POST, 'txtNamaMahasiswa');

         if (empty($nrp) || empty($namaM)) {
            echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
                        icon: "error",
                      });
                      </script>';
         } else {
            $mahasiswa = new Mahasiswa();
            $mahasiswa->setNrp($nrp);
            $mahasiswa->setNamaMahasiswa($namaM);
            $result = $this->mahasiswaDao->insertNewMahasiswa($mahasiswa);
            if ($result) {
               echo '<script>
                    swal({
                        title: "Input Success!",
                        text: "Data Added",
                        icon: "success",
                      });
                      </script>';
            } else {
               echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
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
               $mahasiswa = new Mahasiswa();
               $mahasiswa->setNrp($col[0]);
               $mahasiswa->setNamaMahasiswa($col[1]);
               $result = $this->mahasiswaDao->insertNewMahasiswa($mahasiswa);
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
         $namaM = filter_input(INPUT_POST, 'namaM');

         if (empty($nrp) || empty($namaM)) {
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
            $newMahasiswa->setNamaMahasiswa($namaM);

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
