<?php

class DosenController
{
   private $dosenDao;

   public function __construct()
   {
      $this->dosenDao = new DosenDaoImpl();
   }

   public function index()
   {
      $deleteCommand = filter_input(INPUT_GET, 'delcom');
      if (isset($deleteCommand) && $deleteCommand == 1) {
         $dosenId = filter_input(INPUT_GET, 'did');
         $result = $this->dosenDao->deleteDosen($dosenId);

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
         $nik = filter_input(INPUT_POST, 'txtNIK');
         $namaD = filter_input(INPUT_POST, 'txtNamaDosen');
         $pass = filter_input(INPUT_POST, 'txtPassword');

         if (empty($nik) || empty($namaD)) {
            echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
                        icon: "error",
                      });
                      </script>';
         } else {
            $dosen = new Dosen();
            $dosen->setNrp($nik);
            $dosen->setNama($namaD);
            $dosen->setPassword($pass);
            $result = $this->dosenDao->insertNewDosen($dosen);
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
               $dosen = new Dosen();
               $dosen->setNrp($col[0]);
               $dosen->setNama($col[1]);
               $dosen->setPassword($col[2]);
               $result = $this->dosenDao->insertNewDosen($dosen);
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

      $dosen = $this->dosenDao->fetchAllDosen();

      include_once 'view-admin/dosen.php';
   }

   public function upindex()
   {

      $did = filter_input(INPUT_GET, 'did');

      if (isset($did)) {

         $dosen = $this->dosenDao->fetchDosen($did);
      }

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $nrp = filter_input(INPUT_POST, 'nrp');
         $namaD = filter_input(INPUT_POST, 'namaD');

         if (empty($nrp) || empty($namaD)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                  </script>';
         } else {
            $newDosen = new Dosen();
            $newDosen->setNrp($nrp);
            $newDosen->setNama($namaD);

            $result = $this->dosenDao->updateDosen($newDosen);

            if ($result) {
               echo '<script>
                 window.location = "index.php?ahref=dosen";
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




      include_once 'view-admin/dosen-update.php';
   }
}
