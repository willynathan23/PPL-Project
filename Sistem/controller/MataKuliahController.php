<?php

class MataKuliahController
{
   private $mataKuliahDao;

   public function __construct()
   {
      $this->mataKuliahDao = new MatkulDaoImpl();
   }

   public function index()
   {

      $deleteCommand = filter_input(INPUT_GET, 'delcom');
      if (isset($deleteCommand) && $deleteCommand == 1) {
         $matkulId = filter_input(INPUT_GET, 'mid');
         $result = $this->mataKuliahDao->deleteMatkul($matkulId);

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
         $kode = filter_input(INPUT_POST, 'txtKode');
         $nama = filter_input(INPUT_POST, 'txtMatkul');

         if (empty($kode) || empty($nama)) {
            echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
                        icon: "error",
                      });
                      </script>';
         } else {
            $matakuliah = new Matkul();
            $matakuliah->setKodeM($kode);
            $matakuliah->setNamaM($nama);
            $result = $this->mataKuliahDao->insertNewMatkul($matakuliah);
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
               $matakuliah = new Matkul();
               $matakuliah->setKodeM($col[0]);
               $matakuliah->setNamaM($col[1]);
               $result = $this->mataKuliahDao->insertNewMatkul($matakuliah);
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

      $matakuliah = $this->mataKuliahDao->fetchAllMatkul();

      include_once 'view-admin/matkul.php';
   }


   public function upindex()
   {

      $mid = filter_input(INPUT_GET, 'mid');

      if (isset($mid)) {

         $matakuliah = $this->mataKuliahDao->fetchMatkul($mid);
      }

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $kode = filter_input(INPUT_POST, 'kode');
         $nama = filter_input(INPUT_POST, 'nama');

         if (empty($kode) || empty($nama)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                  </script>';
         } else {
            $newMatakuliah = new Matkul();

            $newMatakuliah->setKodeM($kode);
            $newMatakuliah->setNamaM($nama);

            $result = $this->mataKuliahDao->updateMatkul($newMatakuliah);

            if ($result) {
               echo '<script>
                 window.location = "index.php?ahref=matakuliah";
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


      include_once 'view-admin/matkul-update.php';
   }
}
