<?php

class RuanganController
{
   private $ruanganDao;

   public function __construct()
   {
      $this->ruanganDao = new RuanganDaoImpl();
   }

   public function index()
   {
      $deleteCommand = filter_input(INPUT_GET, 'delcom');
      if (isset($deleteCommand) && $deleteCommand == 1) {
         $ruanganId = filter_input(INPUT_GET, 'rid');
         $result = $this->ruanganDao->deleteRuangan($ruanganId);

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
         $kodeR = filter_input(INPUT_POST, 'txtKodeRuangan');
         $namaR = filter_input(INPUT_POST, 'txtNamaRuangan');

         if (empty($kodeR) || empty($namaR)) {
            echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
                        icon: "error",
                      });
                      </script>';
         } else {
            $ruangan = new Ruangan();
            $ruangan->setKodeR($kodeR);
            $ruangan->setNamaR($namaR);
            $result = $this->ruanganDao->insertNewRuangan($ruangan);
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
               $ruangan = new Ruangan();
               $ruangan->setKodeR($col[0]);
               $ruangan->setNamaR($col[1]);
               $result = $this->ruanganDao->insertNewRuangan($ruangan);
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
      $ruangan = $this->ruanganDao->fetchAllRuangan();
      include_once 'view-admin/ruangan.php';
   }

   public function upindex()
   {

      $rid = filter_input(INPUT_GET, 'rid');

      if (isset($rid)) {

         $ruangan = $this->ruanganDao->fetchRuangan($rid);
      }

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $kodeR = filter_input(INPUT_POST, 'kodeR');
         $namaR = filter_input(INPUT_POST, 'namaR');

         if (empty($kodeR) || empty($namaR)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                  </script>';
         } else {
            $newRuangan = new Ruangan();

            $newRuangan->setKodeR($kodeR);
            $newRuangan->setNamaR($namaR);

            $result = $this->ruanganDao->updateRuangan($newRuangan);

            if ($result) {
               echo '<script>
                 window.location = "index.php?ahref=ruangan";
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


      include_once 'view-admin/ruangan-update.php';
   }
}
