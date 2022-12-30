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
            $newDosen = new Dosen();
            $newDosen->setNrp($nrp);
            $newDosen->setNama($nama);

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
